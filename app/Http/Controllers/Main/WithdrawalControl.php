<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

abstract class WithdrawalControl extends Controller
{
    /** Process Withdrawal */
    public function processWithdrawal(Request $request){
        $notEmpty = Validator::make($request->all(),[
            'amount' => 'required|string',
        ]);

        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a valid amount!',
                'code' => 422,
            ];
        }

        $notEmpty = Validator::make($request->all(),[
            'method' => 'required|string',
        ]);

        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please select a withdrawal method!',
                'code' => 422,
            ];
        }

        if($request['amount'] < 10){
            return [
                'success' => false ,
                'msg'=> 'Sorry, can`t withdraw less than $10!',
                'code' => 422,
            ];
        }

        $user = $this->User->user();

        if($request['method'] == 'Bank Account' && empty($user->bank)){
            return [
                'success' => false ,
                'msg'=> 'Your bank account has not been set yet!',
                'code' => 422,
            ];
        }

        $setting = $this->Setting->model()->first();
        $fee = $request['amount'] * $setting->withdrawal_rate;

        $totalAmount = $request['amount'] + $fee;

        if($totalAmount > $user->wallet){
            return [
                'success' => false ,
                'msg'=> 'Sorry, insufficient funds!',
                'code' => 422,
            ];
        }

        DB::beginTransaction();
        try{
            $user->wallet -= $totalAmount;
            $user->save();

            $withdraw = $this->Withdrawal->create([
                'user_id' => $user->id,
                'bank_account_id' => $user->bank->id,
                'narration' => 'Your withdrawal is processing, you would be notified soon!',
                'reference' => $this->withdrawal_ref(),
                'fees' => $fee,
                'amount' => $request['amount'],
                'status' => 0,
            ]);
            $this->sendWithdrawalMail($withdraw);

            $transaction = $this->Transaction->create([
                'user_id' => $user->id,
                'narration' => 'You requested for withdrawal. Withdrawal No. #'.$withdraw->reference,
                'type' => 'Debit',
                'method' => 'Withdrawal',
                'reference' => $this->transaction_ref(),
                'amount' => $totalAmount,
                'status' => 1,
                'withdrawal_id' => $withdraw->id,
            ]);

            $this->sendTransactionMail($transaction);
            DB::commit();
            return [
                'success' => true ,
                'msg'=> 'Withdrawal successfully initiated!',
                'code' => 201,
            ];
        }
        catch(\Exception $e){
            DB::rollback();
            $this->ErrorLog->create([
                'action' => 'New Withdrawal',
                'error' => $e,
            ]);
            return [
                'success' => false ,
                'msg'=> 'An unexpected error occurred!',
                'code' => 422,
            ];
        }
    }
}
