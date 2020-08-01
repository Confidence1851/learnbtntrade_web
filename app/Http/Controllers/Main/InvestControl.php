<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

abstract class InvestControl extends Controller
{

    private function investRates(){
        $settings = $this->Setting->model()->first();
        return [
            'threePercent' => $settings->three_percent_min,
            'fivePercent' => $settings->five_percent_min,
            'eightPercent' => $settings->eight_percent_min,
            'tenPercent' => $settings->ten_percent_min,
            'twelvePercent' => $settings->twelve_percent_min,
            'fifteenPercent' => $settings->fifteen_percent_min,
            'seventeenPercent' => $settings->seventeen_percent_min,
            'twentyPercent' => $settings->twenty_percent_min,
        ];
    }

    public function investmentData(){
        $user = $this->User->user();
        $iv = $user->investments;

        $active = $iv->where('status', $this->activeStatus)->sum('amount');
        $pending = $iv->where('status',  $this->pendingStatus)->sum('amount');
        $completed = $iv->where('status',  $this->completedStatus)->sum('amount');
        $cancelled = $iv->where('status',  $this->cancelledStatus)->sum('amount');

        $investments = $this->investmentHistory(20);
        $rates = $this->investRates();
        $isSetTransactionPin = false;
        if(!empty($user->account)){
            if(!empty($user->account->transaction_pin)){
                $isSetTransactionPin = true;
            }
        }

        $data = [
            'active' =>  number_format($active ,2),
            'pending' => number_format($pending ,2),
            'completed' => number_format($completed ,2),
            'cancelled' => number_format($cancelled ,2),
            'investments' => $investments,
            'isSetTransactionPin' => $isSetTransactionPin,
        ];

        return $data;
    }

    public function getInvestmentData(Request $request){
        $notEmpty = Validator::make($request->all(),[
            'amount' => 'required|string',
            'period' => 'required|string',
        ]);

        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a valid amount!',
                'code' => $this->validationErrorResponse,
            ];
        }

        $percent = $this->getPercent($request['amount']);

        $profitAmt = $this->interest($request['amount'] , $request['period'] , $percent);


        return [
            'success' => true ,
            'data'=> [
                'total' => $profitAmt,
                'percent' => $percent,
                'capital' => $request['amount'],
                'profit' => round($profitAmt - $request['amount'] , 2)
            ],
            'code' => $this->successResponse,
        ];


    }

    protected function getPercent($amount){
        $rates = $this->investRates();

        if($amount < $rates['threePercent']){
            $percent = 3;
        }
        if($amount < $rates['fivePercent']){
            $percent = 5;
        }
        else if($amount < $rates['eightPercent']){
            $percent = 8;
        }
        else if($amount < $rates['tenPercent']){
            $percent = 10;
        }
        else if($amount < $rates['twelvePercent']){
            $percent = 12;
        }
        else if($amount < $rates['fifteenPercent']){
            $percent = 15;
        }
        else if($amount < $rates['seventeenPercent']){
            $percent = 17;
        }
        else if($amount < $rates['twentyPercent']){
            $percent = 20;
        }
        else{
            $percent = 15;
        }
        return $percent;
    }

    public function interest($investment, $period, $percent){
        $accumulated=0;
        $n = 25;
        if($period < $n){
            return round($investment , 2);
        }
        $period = $period - $n;
        $accumulated = $investment + ($percent/100)*$investment;

        if($period > 0){
            return $this->interest($accumulated , $period , $percent);
        }
        return round($accumulated ,2);
    }

    public function processInvestment(Request $request){

        $notEmpty = Validator::make($request->all(),[
            'amount' => 'required|string',
            'period' => 'required|string',
        ]);

        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'Please enter a valid amount!',
                'code' => $this->validationErrorResponse,
            ];
        }

        $data =  $this->checkAmountAgainstWallet(Auth::id() , $request['amount']);

        if(!$data['success']){
            return $data;
        }

        $percent = $this->getPercent($request['amount']);

        $user = $this->User->user();

        DB::beginTransaction();
        try{
            $user->wallet -= $request['amount'];
            $user->save();

            $invest = $this->Investment->create([
                'user_id' => $user->id,
                'narration' => 'Your investment is processing, kindly await approval!',
                'reference' => $this->investment_ref(),
                'duration' => $request['period'],
                'percent' => $percent,
                'amount' => $request['amount'],
                'status' => $this->pendingStatus,
            ]);

            $transaction = $this->Transaction->create([
                'user_id' => $user->id,
                'narration' => 'You started an investment. Investment No. #'.$invest->reference,
                'type' => 'Debit',
                'method' => 'Investment',
                'reference' => $this->transaction_ref(),
                'amount' => $request['amount'],
                'status' => $this->activeStatus,
                'investment_id' => $invest->id,
            ]);

            $invest['period'] = $invest['period'].' working days';
            $this->sendInvestmentMail($invest);
            $this->sendTransactionMail($transaction);
            DB::commit();
            return [
                'success' => true ,
                'msg'=> 'Investment successfully started!',
                'code' => $this->createdResponse,
            ];
        }
        catch(\Exception $e){
            DB::rollback();
            $this->ErrorLog->create([
                'action' => 'New Investment',
                'error' => $e,
            ]);
            return [
                'success' => false ,
                'msg'=> 'An unexpected error occurred!',
                'code' => $this->validationErrorResponse,
            ];
        }
    }


    public function investmentHistory($limit = 100){
        $user = $this->User->user();
        $raw_invests = $this->Investment->model()->where('user_id',$user->id)->orderby('created_at','desc')->take($limit)->get();
        $investments = [];
        foreach($raw_invests as $invest){
            $invest['status'] = $invest->getStatus();
            $invest['total'] = 100;
            if($invest->status == $this->pendingStatus || $invest->status == $this->cancelledStatus){
                $invest['progress'] = 0;
                array_push($investments,$invest);
            }
            else{
                $start = Carbon::parse($invest->start_date);
                $diff = Carbon::now()->diffInDays($start , false);
                $perc = ( ($diff * 100) / $invest->duration );
                $invest['progress'] = $perc;
                array_push($investments,$invest);
            }
        }
        return $investments;
    }

    public function cancelInvestment(Request $request){
        $notEmpty = Validator::make($request->all(),[
            'id' => 'required|string|exists:investments',
        ]);

        if($notEmpty->fails()){
            return [
                'success' => false ,
                'msg'=> 'An error ocurred!',
                'code' => $this->validationErrorResponse,
            ];
        }
        $invest = $this->Investment->find($request['id']);
        if($invest->status != 'Pending'){
            return [
                'success' => false ,
                'msg'=> 'This investment is not pending!',
                'code' => 400
            ];
        }

        DB::beginTransaction();
        try{
            $invest->status = $this->cancelledStatus;
            $invest->narration = 'Investment has been cancelled by you on '.date('D ,M d Y h:i:a',strtotime(now()));
            $invest->save();

            $user = $this->User->find($invest->user_id);
            $user->wallet += $invest->amount;
            $user->save();

            $transaction = $this->Transaction->create([
                'user_id' => $invest->user_id,
                'narration' => 'Investment cancelled by you. Investment No. #'.$invest->reference,
                'type' => 'Credit',
                'method' => 'Investment',
                'reference' => $this->transaction_ref(),
                'amount' => $invest['amount'],
                'status' => $this->activeStatus,
                'investment_id' => $invest->id,
            ]);
            $this->sendTransactionMail($transaction);
            $this->sendUserNotification([
                'title' => 'Investment Cancelled',
                'user_id' => $user->id,
                'email' => $user->email,
                'type' => 'Investment',
                'reference' => $invest->reference,
                'description' => 'We noticed that you cancelled an investment you placed earlier',
                'message' => 'The investment reference number is #'.$invest->reference.'. Kindly check your investment history with this number to get investment details.',
            ]);
            DB::commit();
            return [
                'success' => true ,
                'msg'=> 'Investment successfully cancelled!',
                'code' => $this->successResponse,
            ];
        }
        catch(\Exception $e){
            DB::rollback();
            $this->ErrorLog->create([
                'action' => 'Cancel Investment',
                'error' => $e,
            ]);
            return [
                'success' => false ,
                'msg'=> 'An unexpected error occurred!',
                'code' => $this->validationErrorResponse,
            ];
        }
    }

    public function getMinimumInvestment(){
        return [
            'success' => true ,
            'msg'=> '',
            'data'=> 25,
            'code' => $this->successResponse,
        ];
    }

}
