<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function order_history(){
        $orders = Order::where('user_id', auth('web')->id())
                    ->orderby('created_at' , 'desc')
                    ->get();
        return view('student.order_history' , compact('orders'));
    }
}
