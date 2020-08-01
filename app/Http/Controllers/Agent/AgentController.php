<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgentTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function account_details(Request $request)
    {
        $data = $request->validate([
            'account_no' => 'required|string',
        ]);
        $user = $this->User->model()->where('account_no',$data['account_no'])->first();
        if(empty($user)){
            $resonse['success'] = false;
            $resonse['name'] = 'User Not Found!';
        }
        else{
            $resonse['success'] = true;
            $resonse['name'] = $user->name;
        }

        return response()->json($resonse);
    }


    public function sell_coupon(Request $request)
    {
        $data = $request->validate([
            'account_no' => 'required|string|exists:users',
            'amount' => 'required|string',
            'pin' => 'required|string',
            'auto_recharge' => 'nullable|string',
        ]);
        // dd($data);
        $agent = $this->User->user();

        if(Hash::check($data['pin'] , $agent->agent->transfer_pin)){
            return redirect()->back()->with('error_msg','Incorrect transfer pin!');
        }
        $user = $this->User->model()->where('account_no',$data['account_no'])->first();

        if(empty($user)){
            return redirect()->back()->with('error_msg','User was not found!');
        }

        if($agent->agent->wallet < $data['amount']){
            return redirect()->back()->with('error_msg','Insufficient Funds!');
        }

        DB::beginTransaction();
        try{
            $data['agent_id'] = $agent->id;
            $data['user_id'] = $user->id;
            $data['batch_no'] = time();

            $agent->agent->wallet -= $data['amount'];
            $agent->agent->save();

            $coupon = $this->Coupon->create([
                'agent_id' => $data['agent_id'],
                'user_id' => $data['user_id'],
                'card_no' => $this->getCode(),
                'amount' => $data['amount'],
                'commission' => $this->calculate_commission($data['amount']),
                'batch_no' => $data['batch_no'],
                'status' => $this->activeStatus,
            ]);

            $this->sendStakeCardMail([
                'title' => 'Your StakeCard has arrived!',
                'email' => $user->email,
                'subject' => 'We received your request and cheers , your StakeCard is here. Find the details below!',
                'agent' => $agent->agent->display_name,
                'card_no' => $coupon->card_no,
                'amount' => $coupon->amount,
                'batch_no' => $coupon->batch_no,
                'created_at' => $coupon->created_at,
            ]);

            $this->sendUserNotification([
                'title' => 'Your StakeCard has arrived!',
                'user_id' => $user->id,
                'email' => $user->email,
                'type' => 'StakeCard',
                'message' => 'Card No: #'. $coupon->card_no,
                'send_mail' => false,
            ]);

            $this->AgentTransaction->model()->create([
                'user_id' => $agent->id,
                'narration' => 'You generated a stake card #'.$coupon->card_no,
                'type' => 'Debit',
                'reference' => time(),
                'amount' => $coupon->amount,
                'status' => $this->activeStatus,
            ]);

            if(!empty($data['auto_recharge'])){
                $this->credit_stakecard($coupon , $user);
            }
            DB::commit();
            return redirect()->back()->with('success_msg','Transaction successful!');
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error_msg', $e->getMessage());
        }
    }

    public function agent_transactions(){
        $transactions = $this->AgentTransaction->model()->where('user_id', $this->User->user()->id)->orderby('created_at','desc')->get();
        return view('agent.transactions.index',compact('transactions'));
    }

    public function agent_coupons(){
        $coupons = $this->Coupon->model()->where('agent_id', $this->User->user()->id)->orderby('created_at','desc')->get();
        return view('agent.coupons.index',compact('coupons'));
    }

    public function update_pin(Request $request)
    {
        $data = $request->validate([
            'old_pin' => 'required|string',
            'new_pin' => 'required|string',
            'confirm_pin' => 'required|string',
        ]);

        if($data['new_pin'] !== $data['confirm_pin']){
            return redirect()->back()->with('error_msg','Pins do not match!');
        }

        $agent = $this->User->user();

        if($agent->agent->transfer_pin !== $data['old_pin']){
            return redirect()->back()->with('error_msg','Old pin is incorrect!');
        }

        $agent->agent->transfer_pin = Hash::make($data['new_pin']);
        $agent->agent->save();
        return redirect()->back()->with('success_msg','Transfer pin saved successfully!');
    }
}
