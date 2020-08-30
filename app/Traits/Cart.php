<?php
namespace App\Traits;

use App\Models\Cart as ModelsCart;
use App\Models\CartItem;
use App\Models\Plan;

trait Cart{
    public function addToCart($course_id  = null , $plan_id = null){
        $cart = getUserCart();

        if(!empty($course_id)){
            $course = $this->Course->find($course_id);

            if(empty($course)){
                return ['success' => false, 'msg' => 'Course could not be validated!'];

            }

            $check = CartItem::where('cart_id' , $cart->id)->where('course_id' , $course->id)->count();
            if($check > 0){
                return ['success' => false, 'msg' => 'Course already exists in cart!'];
            }

            if(in_array($course->id , getMyCourses()->toArray())){
                return ['success' => false, 'msg' => 'You already purchased this course!'];
            }

            $item = CartItem::create([
                'cart_id' => $cart->id,
                'course_id' => $course->id
            ]);
            $msg = 'Course added to cart!';
        }
        elseif(!empty($plan_id)){
            $plan = Plan::find($plan_id);
            if(empty($plan)){
                return ['success' => false, 'msg' => 'Plan could not be validated!'];
            }

            $check = CartItem::where('cart_id' , $cart->id)->where('plan_id' , $plan->id)->count();
            if($check > 0){
                return ['success' => false, 'msg' => 'Plan already exists in cart!'];
            }

            $item = CartItem::create([
                'cart_id' => $cart->id,
                'plan_id' => $plan->id
            ]);
            $msg = 'Plan added to cart!';
        }

        $cart = refreshCart($cart->id);

        return [
            'success' => true,
            'msg' => $msg ?? 'Item added to cart',
            'total' => format_money($cart->total),
            'price' => format_money($cart->price),
            'discount' => format_money($cart->discount),
            'quantity' => $cart->quantity,
            'item_id' => $item->id,
        ];
    }


    public function removeFromCart($item_id){
        $item = Cartitem::find($item_id);
        if(empty($item->id)){
            return ['success' => false, 'msg' => 'Could not remove item from cart!'];
        }

        $cart = ModelsCart::find($item->cart_id);
        $item->delete();
        $cart = refreshCart($cart->id);
        return [
            'success' => true,
            'msg' => 'Item removed from cart',
            'total' => format_money($cart->total),
            'price' => format_money($cart->total),
            'discount' => format_money($cart->total),
            'quantity' => $cart->quantity,
        ];
    }

}
