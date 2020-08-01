<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AgentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->User->model()->where('id','<>', $this->User->user()->id )->where('status','1')->where('sub_role',0)->get();
        $agents = $this->Agent->all();

        foreach($agents as $agent){
            $agent['clients'] = $this->Coupon->model()->where('agent_id',$agent->id)->distinct('user_id')->count();
            $agent['sales'] = $this->Coupon->model()->where('agent_id',$agent->id)->sum('amount');
            $agent['profit'] = $this->Coupon->model()->where('agent_id',$agent->id)->sum('commission');
        }
        return view('admin.user_management.agents.users',compact('users' , 'agents'));
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
        $data = $request->validate([
            'user_id' => 'required|string|exists:users,id',
            'department' => 'required|string',
            'wallet' => 'required|string',
            'whatsapp_no' => 'required|string',
        ]);

        $user = $this->User->find($data['user_id']);
        if(!empty($user)){
            if(empty($user->agent)){
                $pin =  time();
                $data['display_name'] = $user->name;
                $data['status'] = 1;
                $data['transfer_pin'] = Hash::make($pin);
                // Create New agent
                DB::beginTransaction();
                try{
                    $agent = $this->Agent->create($data);
                    $this->User->update($user->id,["sub_role" => 1]);
                    DB::commit();
                }
                catch (\Exception $e) {
                    DB::rollback();
                    return redirect()->back()->with('error_msg',$e->getMessage());
                }
                // Send email to agent containing pin
                $this->newAgentNotify($user->email , $data['wallet'] , $pin);
                // Update User Status
                $this->adminLog('added agent with id '.$agent->id.' to the agents list', 'Agent' , route('agents.show',$agent->id));
                return redirect()->back()->with('success_msg', 'Agent created successfully!');
            }
            else{
                return redirect()->back()->with('error_msg', 'This user is already an agent!');
            }
        }
        else{
            return redirect()->back()->with('error_msg', 'User not found!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = $this->Agent->model()->findorfail($id);
        $coupons = $this->Coupon->model()->where('agent_id',$agent->user->id)->orderby('created_at','desc')->get();
        $today = array();
        $todaySum = array();
        $todayClients = array();
        $week = array();
        $weekSum = array();
        $weekClients = array();
        $month = array();
        $monthSum = array();
        $monthClients = array();
        foreach($coupons as $coupon){

            if(now()->diffinDays(Carbon::parse($coupon->created_at,false)) < 1){
                array_push($today , $coupon);
                array_push($todaySum , $coupon->amount);
                if(!in_array($coupon->user_id,$todayClients)){
                    array_push($todayClients , $coupon->user_id);
                }
            }

            if(now()->diffinWeeks(Carbon::parse($coupon->created_at,false)) < 1){
                array_push($week , $coupon);
                array_push($weekSum , $coupon->amount);
                if(!in_array($coupon->user_id,$weekClients)){
                    array_push($weekClients , $coupon->user_id);
                }
            }

            if(now()->diffinMonths(Carbon::parse($coupon->created_at,false)) < 1){
                array_push($month , $coupon);
                array_push($monthSum , $coupon->amount);
                if(!in_array($coupon->user_id,$monthClients)){
                    array_push($monthClients , $coupon->user_id);
                }
            }
        }

        $data['today'] = $today;
        $data['todaySum'] = array_sum($todaySum);
        $data['todayClients'] = count($todayClients);
        $data['week'] = $week;
        $data['weekSum'] = array_sum($weekSum);
        $data['weekClients'] = count($weekClients);
        $data['month'] = $month;
        $data['monthSum'] = array_sum($monthSum);
        $data['monthClients'] = count($monthClients);
        $data['clients'] = $this->Coupon->model()->where('agent_id',$agent->user->id)->distinct('user_id')->count();
        $data['sales'] = $coupons->sum('amount');
        $data['profit'] = $coupons->sum('commission');
        $data['commission'] = $this->calculate_commission(1);
        $data['coupons'] = $coupons;
        $data['transactions'] =  $this->AgentTransaction->model()->where('user_id', $agent->user->id)->orderby('created_at','desc')->get();
        // dd($data);

        return view('admin.user_management.agents.user_info',compact('agent' , 'data'));
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
        $data = $request->validate([
            'display_name' => 'required|string',
            'department' => 'required|string',
            'whatsapp_no' => 'required|string',
            'status' => 'required|string',
            'transfer_pin' => 'nullable|string',
        ]);

        $pin = $data['transfer_pin'];
        if(empty($pin)){
            $data['transfer_pin'] = Hash::make($pin);
        }
        $agent = $this->Agent->find($id);
        if(empty($agent)){
            return redirect()->back()->with('error_msg','Agent not found!');
        }
        $this->Agent->update($id , $data);
        if(empty($pin)){
            $this->sendNotificationMail([
                'title' => 'Agent Transaction Pin Changed!',
                'subject' => 'Hello, we detected that your change account!',
                'email' => $agent->user->email,
                'message' => 'Your new agent transfer pin is '.$pin,
            ]);
        }
        return redirect()->back()->with('success_msg','Update completed successfully!');
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


    public function refill_agent(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|string',
            'amount' => 'required|string',
        ]);

        $user = $this->User->model()->findorfail($data['agent_id']);
        $user->agent->wallet += $data['amount'];
        $user->agent->save();

        $this->AgentTransaction->create([
            'user_id' => $user->id,
            'narration' => 'Your account was refilled',
            'type' => 'Credit',
            'reference' => time(),
            'amount' => $data['amount'],
            'status' => 1,
        ]);

        $this->accountBalanceAgentNotify($user->email , $data['amount']);
        return redirect()->back()->with('success_msg','Transaction successful!');
    }
}
