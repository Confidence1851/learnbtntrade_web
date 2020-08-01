<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FiatControl extends Controller
{


    public function validateWalletBalance(Request $request){
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

        return $this->checkAmountAgainstWallet(Auth::id() , $request['amount']);

    }


    public function processFiatTransfer(Request $request){

        $notEmpty = Validator::make($request->all(),[
            'account_no' => 'required|string',
        ]);
        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a valid account number!',
                'code' => $this->validationErrorResponse,
            ];
        }


        $notEmpty = Validator::make($request->all(),[
            'amount' => 'required|string',
        ]);
        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a transfer amount!',
                'code' => $this->validationErrorResponse,
            ];
        }

        $receiver = $this->User->model()->where('account_no' , $request['account_no'])->first();
        if(empty($receiver)){
            return [
                'success' => false ,
                'msg'=> 'Invalid account number, please check again!',
                'code' => $this->badRequestResponse,
            ];
        }

        $setting = $this->Setting->model()->first();
        $data = $this->checkAmountAgainstWallet(Auth::id() , $request['amount'] , $setting->transfer_rate);

        if(!$data['success']){
            return $data;
        }

        DB::beginTransaction();

        try{
            $ref = $this->fiatTransfer_ref();

            $user = $this->User->user();
            $user->wallet = ($user->wallet - $data['amount']);
            $user->save();

            $user->refresh();
            $receiver->refresh();

            $receiver->wallet = ($receiver->wallet + $request['amount']);
            $receiver->save();

            $fiatTransfer = $this->FiatTransfer->create([
                'user_id' => $user->id,
                'receiver_id' => $receiver->id,
                'narration' => 'Fiat transfer from Sender:'.$user->name.' to Receiver:'.$receiver->name,
                'reference' => $ref,
                'amount' => $data['amount'],
                'fees' => $data['total_fee'],
                'status' => $this->activeStatus,
            ]);

            $debit = [
                    'user_id' => $user->id,
                    'narration' => 'Fiat transfer to '.$receiver->name.' was successful #'.$ref,
                    'type' => 'Debit',
                    'method' => 'Transfer',
                    'reference' => $this->transaction_ref(),
                    'amount' => $data['amount'],
                    'status' => $this->activeStatus,
                    'fiat_transfer_id' => $fiatTransfer->id,
            ];

            $credit = [
                    'user_id' => $receiver->id,
                    'narration' => 'Fiat transfer from '.$user->name.' was successful #'.$ref,
                    'type' => 'Credit',
                    'method' => 'Transfer',
                    'reference' => $this->transaction_ref(),
                    'amount' => $request['amount'],
                    'status' => $this->activeStatus,
                    'fiat_transfer_id' => $fiatTransfer->id,
            ];

            $debitTransaction = $this->Transaction->create($debit);
            $this->sendTransactionMail($debitTransaction);

            $creditTransaction = $this->Transaction->create($credit);
            $this->sendTransactionMail($creditTransaction);

            DB::commit();
            return [
                'success' => true ,
                'msg'=> 'Transfer successful',
                'amount' => $request['amount'],
                'code' => $this->successResponse,
            ];
        }
        catch(\Exception $e){

            DB::rollback();
            $this->logError('Process Fiat Transfer' , $e->getMessage());

            return [
                'success' => false ,
                'msg'=> $e->getMessage(),
                'code' => $this->badRequestResponse,
            ];
        }
    }
}
