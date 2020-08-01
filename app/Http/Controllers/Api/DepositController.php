<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\DepositControl;
use Illuminate\Http\Request;

class DepositController extends DepositControl
{
    public function recharge_stakecard(Request $request){
        $data = $this->rechargeStakecard($request);
        return response()->json($data,$data['code']);
    }
}
