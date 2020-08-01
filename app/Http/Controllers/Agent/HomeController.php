<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AgentRepositoryInterface;
use App\Repositories\Interfaces\CouponRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Traits\ModelIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class HomeController extends Controller
{

    use ModelIndex;
    protected $User;
    protected $Agent;
    protected $Coupon;
    public function __construct(
            UserRepositoryInterface $userRepositoryInterface ,
            AgentRepositoryInterface $agentRepositoryInterface ,
            CouponRepositoryInterface $couponRepositoryInterface
        )
    {
        $this->middleware('auth');
        $this->User = $userRepositoryInterface;
        $this->Agent = $agentRepositoryInterface;
        $this->Coupon = $couponRepositoryInterface;
    }


    public function index(){
        // dd(Session::all());
        $success_msg = Session::get('success_msg');
        $error_msg = Session::get('error_msg');
        $user = $this->User->user();
        $agent = $user->agent;
        if(empty($agent)){
            return view('agent.home' , compact('user'))->with('success_msg', $success_msg)->with('error_msg', $error_msg);
        }

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
            // dump(Carbon::parse($coupon->created_at,false));
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
        // dd($today);
        $data['today'] = $today;
        $data['todaySum'] = array_sum($todaySum);
        $data['todayClients'] = array_count_values($todayClients);
        $data['week'] = $week;
        $data['weekSum'] = array_sum($weekSum);
        $data['weekClients'] = array_count_values($weekClients);
        $data['month'] = $month;
        $data['monthSum'] = array_sum($monthSum);
        $data['monthClients'] = array_count_values($monthClients);
        $data['clients'] = $this->Coupon->model()->where('agent_id',$agent->user->id)->distinct('user_id')->count();
        $data['sales'] = $coupons->sum('amount');
        $data['profit'] = $coupons->sum('commission');
        $data['commission'] = $this->calculate_commission(1);
        // dd($data);
        return view('agent.home' , compact('user' , 'data'))->with('success_msg', $success_msg)->with('error_msg', $error_msg);
    }

    public function agent_coupons(){
        $coupons = $this->Coupon->model()->where('agent_id', $this->User->user()->id)->get();
        return view('agent.coupon.index' , compact('coupons'));
    }


}
