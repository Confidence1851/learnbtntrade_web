<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\WithdrawalControl;
use Illuminate\Http\Request;

class WithdrawalController extends WithdrawalControl
{
    public function process_withdrawal(Request $request){
        $data = $this->processWithdrawal($request);
        return response()->json($data,$data['code']);
    }
}
