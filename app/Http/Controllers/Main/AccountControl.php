<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\DB;

abstract class AccountControl extends Controller
{

    public function banksList(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
             CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            // CURLOPT_HTTPHEADER => array(
            // 	// Set Here Your Requesred Headers

            // ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $result = json_decode($response);
            $returnData = $result;
            // foreach($returnData as $r){
            //     dump($r->name);
            // }
            // dd('done');

            return $returnData ;
        }
    }

    public function verifyBank(Request $request){
        $validator = Validator::make($request->all(),[
            'account_no' => 'required|string',
            'bank_code' => 'required|string',
        ]);
        if($validator->fails()){
            return [
                'success' => false ,
                'msg'=> $request->all(),
                'code' => $this->validationErrorResponse,
            ];
        }

        $header = array('Authorization'=> 'Bearer sk_test_330316b67ae52439a917131419670adab0db60b6');
        $link = 'account_number='.$request['account_no'].'&bank_code='.$request['bank_code'] ;

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://api.paystack.co/bank/resolve?".$link,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //      CURLOPT_TIMEOUT => 30000,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "GET",
        //     CURLOPT_HTTPHEADER => array(
        //     	'Authorization' => 'Bearer sk_test_330316b67ae52439a917131419670adab0db60b6' ,

        //     ),
        // ));


        $client = new \GuzzleHttp\Client(['http_errors' => false]);
        $header = array('Authorization'=> 'Bearer sk_test_330316b67ae52439a917131419670adab0db60b6');
        // $link = 'account_number='.$account_no.'&bank_code='.$bank_code ;
        $request = $client->get("https://api.paystack.co/bank/resolve?".$link , array('headers' => $header ) );
        $return = json_decode($request->getBody());

        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     $result = json_decode($response);
            // $returnData = $result;


            // return $return ;
        // }

        if($return->status == true){
            return ['status'=>true,'name'=>$return->data->account_name];
        }
        if($return->status == false){
            return ['status'=>false,'name'=>'Account not found!'];
        }

    }

    public function updateBank(Request $request){
        $validator = Validator::make($request->all(),[
            'account_name' => 'required|string',
            'account_number' => 'required|string',
            'bank_name' => 'required|string',
        ]);

        if($validator->fails()){
            return [
                'success' => false ,
                'msg'=> 'One or more fields are missing!',
                'code' => $this->validationErrorResponse,
            ];
        }

        $user = $this->User->user();

        if(!empty($user->bank)){
            return [
                'success' => false ,
                'msg'=> 'Sorry, you have already updated your bank account details!',
                'code' => $this->badRequestResponse,
            ];
        }
        try{
            $this->BankAccount->create([
                'user_id' => $user->id,
                'bank_name' => $request['bank_name'],
                'account_name' => $request['account_name'],
                'account_number' => $request['account_number'],
            ]);

            return [
                'success' => true ,
                'msg'=> 'Bank account updated successfully!',
                'code' => $this->successResponse,
            ];
        }
        catch(\Exception $e){
            return [
                'success' => false ,
                'msg'=> 'An error occurred form the server!',
                'code' => $this->serverErrorResponse,
            ];
        }

    }

    public function accountSettings(){
        $tpin = false;
        $bankAcct = false;
        $user = $this->User->user();
        if(empty($user->account)){
            $tpin = false;
        }
        else{
            $tpin = true;
        }

        if(!empty($user->bank)){
            $bankAcct = true;
            $bank_details = [
                'bank_name' => $user->bank->bank_name,
                'account_name' => $user->bank->account_name,
                'account_number' => $user->bank->account_number,
            ];
        }
        else{
            $bankAcct = false;
            $bank_details = [
                'bank_name' => '',
                'account_name' => '',
                'account_number' => '',
            ];
        }

        $data = [
            'isTransactionPinSet' => $tpin,
            'isBankAccountSet' => $bankAcct,
            'bank_details' => $bank_details,
        ];
        return $data;
    }

    public function setTransactionPin(Request $request){

        $notEmpty = Validator::make($request->all(),[
            'pin' => 'required|string',
        ]);
        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a valid pin!',
                'code' => $this->validationErrorResponse,
            ];
        }

        $user = $this->User->user();

        if(!empty($user->account)){
            $user->account->update(['transaction_pin' => encrypt($request['pin']) ]);
        }
        else{
           $this->Account->create([
               'user_id' => $user->id,
               'transaction_pin' => encrypt($request['pin'])
           ]);
        }

        return [
            'success' => true ,
            'msg'=> 'Transaction pin updated successfully!',
            'code' => $this->successResponse,
        ];
    }

    public function confirmTransactionPin(Request $request){

        $notEmpty = Validator::make($request->all(),[
            'pin' => 'required|string',
        ]);
        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a valid pin!',
                'code' => $this->validationErrorResponse,
            ];
        }

        $user = $this->User->user();

        if(empty($user->account) || empty($user->account->transaction_pin)){
            return [
                'success' => false ,
                'msg'=> 'Couldn`t verify pin!',
                'code' => $this->badRequestResponse,
            ];
        }
        else{
            if(strval(decrypt($user->account->transaction_pin)) !== $request['pin']){
                return [
                    'success' => false ,
                    'msg'=> 'Your pin is incorrect!',
                    'code' => $this->badRequestResponse,
                ];
            }
            else{
                return [
                    'success' => true ,
                    'msg'=> 'Pin confirmed!',
                    'code' => $this->successResponse,
                ];
            }
        }

        return [
            'success' => false ,
            'msg'=> 'An unknown error occurred!',
            'code' => 400
        ];
    }

    public function accountData(){
        $user = $this->User->user();
        $setting = $this->Setting->model()->first();
        $isSetTransactionPin = false;
        if(!empty($user->account)){
            if(!empty($user->account->transaction_pin)){
                $isSetTransactionPin = true;
            }
        }
        $total_deposits = $this->Deposit->model()->where('user_id',$user->id)->sum('amount');
        $total_investments = $this->Investment->model()->where('user_id',$user->id)->sum('amount');
        $total_withdrawals = $this->Withdrawal->model()->where('user_id',$user->id)->sum('amount');
        $total_fiat_transfers = $this->FiatTransfer->model()->where('user_id',$user->id)->sum('amount');

        $data = [
            'wallet' => $user->wallet,
            'transfer_rate' => $setting->transfer_rate,
            'withdrawal_rate' => $setting->withdrawal_rate,
            'total_deposits' => $total_deposits,
            'total_withdrawals' => $total_withdrawals,
            'total_investments' => $total_investments,
            'total_investment_profits' => 0.00,
            'total_fiat_transfers' => $total_fiat_transfers,
            'isSetTransactionPin' => $isSetTransactionPin,

        ];
        return $data;
    }

    public function validateReceiver(Request $request){
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

        $receiver = $this->User->model()->where('account_no' , $request['account_no'])->first();
        if(empty($receiver)){
            return [
                'success' => false ,
                'msg'=> 'Invalid account number, please check again!',
                'code' => $this->badRequestResponse,
            ];
        }
        return [
            'success' => true ,
            'msg'=> $receiver->name,
            'code' => $this->successResponse,
        ];
    }

    public function rewardReferrer(Request $request){
        $notEmpty = Validator::make($request->all(),[
            'referrer' => 'required|string',
        ]);
        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a valid referral number!',
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
        return [
            'success' => true ,
            'msg'=> $receiver->name,
            'code' => $this->successResponse,
        ];
    }

}
