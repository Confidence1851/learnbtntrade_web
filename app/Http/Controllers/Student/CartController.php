<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Traits\Cart as TraitsCart;
use Cart as GlobalCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use TraitsCart;

    // public function __construct()
    // {
    //     $this->middleware = 'auth';
    // }

    public function addCourseToCart(Request $request){

        if(empty($request['course_id'])){
            return response()->json(['success' => false, 'msg' => 'Could not validate request!']);
        }
        $processCart = $this->addToCart($request['course_id']);
        if($processCart['success']){
            $processCart['type'] = 'add';
            $processCart['msg'] = 'Course added to cart!';
            $processCart['title'] = 'Remove from cart';
            $processCart['action'] = route('cart.remove');
        }
        return response()->json($processCart);
    }

    public function removeCourseFromCart(Request $request){

        if(empty($request['course_cart_id'])){
            return response()->json(['success' => false, 'msg' => 'Could not validate request!']);
        }
        $processCart = $this->removeFromCart($request['course_cart_id']);
        if($processCart['success']){
            $processCart['type'] = 'remove';
            $processCart['msg'] = 'Course removed from cart!';
            $processCart['title'] = 'Add to Cart';
            $processCart['action'] = route('cart.add');
        }
        return response()->json($processCart);
    }

    public function items(){
        $cart = getUserCart();
        $items = getUserCart()->items;
        $reference = $cart->reference;
        return view('web.cart', compact('cart', 'items' , 'reference'));
    }

    public function checkout(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'file' => 'required|file|mimetypes:image/jpeg,image/png,image/jpg,application/pdf',
            'comment' => 'nullable|string',
            'reference' => 'required|string',
        ]);
        if(!empty( $file = $request->file('file'))){
            $data['file'] = putFileInPrivateStorage($file , $this->orderReceiptsFilePath);
        }

        // DB::beginTransaction();
        $cart = getUserCart();
        $data['user_id'] = auth('web')->id();
        $data['amount'] = $cart->total;
        $data['discount'] = $cart->discount;
        $data['reference'] = $cart->reference;
        $data['payment_type'] = 'Bank Transfer';

        $order = Order::create($data);

        foreach($cart->items as $item){
            $amount = 0;
            $discount = 0;
            if(!empty($item->course_id)){
                if(!empty($course = $item->course)){
                    $amount = $course->payableAmount();
                    $discount = $course->discount;
                }
            }
            OrderItem::create([
                'order_id' => $order->id,
                'user_id' => auth('web')->id(),
                'course_id' => $item->course_id,
                'bundle_id' => $item->bundle_id,
                'amount' => $amount,
                'discount' => $discount,
            ]);

            $item->course->orders_count += 1;
            $item->course->save();
            $item->delete();
        }

        refreshCart($cart->id , true);
        $return = [
            'msg' => 'Your order has been submitted and is awaiting approval!',
            'reference' => $order->reference,
        ];
        return redirect()->route('cart.checkout.success' , encrypt($return));
    }

    public function checkoutSuccess($data){
        $data = decrypt($data);
        $message = $data['msg'];
        $reference = $data['reference'];
        return view('web.checkout_complete' , compact('message' , 'reference'));
    }
}
