<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class DepositControl extends Controller
{

    public function rechargeStakecard(Request $request){

        $validator = Validator::make($request->all(),[
            'card_no' => 'required|string',
        ]);
        if($validator->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a valid card!',
                'code' => $this->badRequestResponse,
            ];
        }

        $user = $this->User->user();
        $coupon = $this->Coupon->model()->where('card_no',$request['card_no'])->first();

        if(empty($coupon)){
            return [
                    'success' => false ,
                    'msg'=> 'This card is invalid!',
                    'code' => $this->badRequestResponse,
                ];
        }
        else{
            if($coupon->status != $this->activeStatus){
                return [
                    'success' => false ,
                    'msg'=> 'This card is currently not active!',
                    'code' => $this->badRequestResponse,
                ];
            }
            if(empty($coupon->user_id)){
                if(!empty($coupon->use_date)){
                    return [
                        'success' => false ,
                        'msg'=> 'Sorry, this card has been used!',
                        'code' => $this->badRequestResponse,
                    ];
                }

            }else{
                if($coupon->user_id != $user->id){
                    return [
                        'success' => false ,
                        'msg'=> 'This card has been sold to another user!',
                        'code' => $this->badRequestResponse,
                    ];
                }
                if(!empty($coupon->use_date)){
                    return [
                        'success' => false ,
                        'msg'=> 'This card has been used by you!',
                        'code' => $this->badRequestResponse,
                    ];
                }
            }
        }
        try{
            if($this->credit_stakecard($coupon , $user)){
                return [
                    'success' => true ,
                    'msg'=> 'Recharge successful!',
                    'code' => $this->successResponse,
                ];
            }
            else{
                return [
                    'success' => false ,
                    'msg'=> 'Couldn`t process transaction!',
                    'code' => $this->badRequestResponse,
                ];
            }
        }
        catch(\Exception $e){
            return [
                'success' => false ,
                'msg'=> $e->getMessage(),
                'code' => $this->badRequestResponse,
            ];
        }
    }

}
