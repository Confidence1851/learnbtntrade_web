<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\InvestControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvestmentController extends InvestControl
{
    public function investment_details(){
        $data = $this->investmentData();
        return response()->json($data, $this->successResponse);
    }

    public function get_investment_data(Request $request){
        $data = $this->getInvestmentData($request);
        return response()->json($data,$data['code']);
    }

    public function process_investment(Request $request){
        $data = $this->processInvestment($request);
        return response()->json($data,$data['code']);
    }

    public function check_wallet_balance(Request $request){
        $notEmpty = Validator::make($request->all(),[
            'amount' => 'required|string',
        ]);

        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a valid amount!',
                'code' => $this->validationErrorResponse,
            ];
        }
        $data = $this->checkAmountAgainstWallet(auth('api')->user()->id , $request['amount']);
        return response()->json($data,$data['code']);
    }

    public function investment_history(){
        $data = $this->investmentHistory();
        return response()->json($data, $this->successResponse);
    }

    public function cancel_investment(Request $request){
        $data = $this->cancelInvestment($request);
        return response()->json($data,$data['code']);
    }

    public function get_min_investment(){
        $data = $this->getMinimumInvestment();
        return response()->json($data,$data['code']);
    }



}
