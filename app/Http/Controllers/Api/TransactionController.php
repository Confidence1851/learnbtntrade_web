<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\TransactionControl;
use Illuminate\Http\Request;

class TransactionController extends TransactionControl
{

    public function transaction_history(){
        $data = $this->transactionHistory();
        return response()->json($data, $this->successResponse);
    }

    public function search_transactions(Request $request){
        $data = $this->searchTransactions($request);
        return response()->json($data, $this->successResponse);
    }

}
