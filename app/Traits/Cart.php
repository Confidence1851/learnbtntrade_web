<?php
namespace App\Traits;

use App\Models\Cart as ModelsCart;
use App\Models\CartItem;

trait Cart{
    public function addToCart($course_id){
        $course = $this->Course->find($course_id);
        if(empty($course->id)){
            return ['success' => false, 'msg' => 'Course could not be validated!'];
        }

        $cart = getUserCart();
        $check = CartItem::where('cart_id' , $cart->id)->where('course_id' , $course->id)->count();
        if($check > 0){
            return ['success' => false, 'msg' => 'Course already exists in cart!'];
        }

        $item = CartItem::create([
            'cart_id' => $cart->id,
            'course_id' => $course->id
        ]);

        $cart = refreshCart($cart->id);

        return [
            'success' => true,
            'msg' => 'Course added to cart',
            'total' => format_money($cart->total),
            'price' => format_money($cart->total),
            'discount' => format_money($cart->total),
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
