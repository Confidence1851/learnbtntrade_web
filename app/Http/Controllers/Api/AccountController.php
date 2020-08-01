<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\AccountControl;
use Illuminate\Http\Request;

class AccountController extends AccountControl
{
    public function banks_list(){
        $data = $this->banksList();
        return response()->json($data, $this->successResponse);
    }

    public function verify_bank(Request $request){
        $data = $this->verifyBank($request);
        return response()->json($data, $this->successResponse);
    }

    public function update_bank(Request $request){
        $data = $this->updateBank($request);
        return response()->json($data,$data['code']);
    }

    public function set_transaction_pin(Request $request){
        $data = $this->setTransactionPin($request);
        return response()->json($data,$data['code']);
    }

    public function confirm_transaction_pin(Request $request){
        $data = $this->confirmTransactionPin($request);
        return response()->json($data,$data['code']);
    }

    public function account_settings(Request $request){
        $data = $this->accountSettings($request);
        return response()->json($data, $this->successResponse);
    }

    public function account_details(){
        $data = $this->accountData();
        return response()->json($data, $this->successResponse);
    }

    public function validate_receiver(Request $request){
        $data = $this->validateReceiver($request);
        return response()->json($data,$data['code']);
    }

}
