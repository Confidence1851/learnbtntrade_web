<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Main\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Transactions
{
    public function data(){
        $data = $this->getData();
        dd($data);
    }
}
