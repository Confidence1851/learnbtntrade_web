<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\WithdrawalRepository;use Illuminate\Http\Request;

class TransactionsController extends Controller
{

    public function debit_index(){
        $transactions = $this->Transaction->model()->where('type','Debit')->orderby('created_at','desc')->get();
        $transType = 'DEBIT';
        return view('admin.user_transaction.index',compact('transactions','transType'));
    }

    public function credit_index(){
        $transactions = $this->Transaction->model()->where('type','Debit')->orderby('created_at','desc')->get();
        $transType = 'CREDIT';
        return view('admin.user_transaction.index',compact('transactions','transType'));
    }
}
