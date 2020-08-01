<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\FiatControl;
use Illuminate\Http\Request;

class FiatController extends FiatControl
{

    public function validate_wallet_fiat_balance(Request $request){
        $data = $this->validateWalletBalance($request);
        return response()->json($data,$data['code']);
    }

    public function process_fiat_transfer(Request $request){
        $data = $this->processFiatTransfer($request);
        return response()->json($data);
    }
}
