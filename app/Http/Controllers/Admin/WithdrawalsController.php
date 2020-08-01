<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WithdrawalsController extends Controller
{
    public function index(){
        $withdrawals = $this->Withdrawal->model()->where('status','!=','Pending')->orderby('created_at','desc')->get();
        return view('admin.withdrawals.index',compact('withdrawals'));
    }

    public function pending(){
        $withdrawals = $this->Withdrawal->model()->where('status','Pending')->orderby('created_at','desc')->get();
        foreach($withdrawals as $withdrawal){
            $withdrawal['color'] = 'green';
            $withdrawal['timeout'] = Carbon::parse($withdrawal->created_at)->longRelativeToNowDiffForHumans();
            if(Carbon::parse($withdrawal->created_at)->diffInHours(now() , false) > 23){
                $withdrawal['color'] = 'blue';
            }
            if(Carbon::parse($withdrawal->created_at)->diffInHours(now() , false) > 47){
                $withdrawal['color'] = 'red';
            }

        }
        return view('admin.withdrawals.pending',compact('withdrawals'));
    }

    /**
     * Approve investments.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        $data = $request->validate([
            'withdrawal_id' => 'required|string'
        ]);
        $withdrawal = $this->Withdrawal->find($data['withdrawal_id']);
        if(empty($withdrawal)){
            return redirect()->back()->with('error_msg','Withdrawal not found!');
        }
        $this->Withdrawal->update($withdrawal->id , ['status'  => $this->processingStatus]);
        // Send mail to user
        return redirect()->back()->with('success_msg','Withdrawal successfully updated!');
    }

    public function cancel(Request $request)
    {
        $data = $request->validate([
            'withdrawal_id' => 'required|string',
            'comment' => 'required|string',
        ]);
        $withdrawal = $this->Withdrawal->find($data['withdrawal_id']);
        if(empty($withdrawal)){
            return redirect()->back()->with('error_msg','Withdrawal not found!');
        }
        $this->Withdrawal->update($withdrawal->id , ['status'  => $this->cancelledStatus]);
        // Send mail to user with the comment
        return redirect()->back()->with('success_msg','Withdrawal successfully updated!');
    }

}
