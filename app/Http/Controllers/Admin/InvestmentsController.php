<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentsController extends Controller
{

    public function index(){
        $investments = $this->Investment->model()->where('status','!=','Pending')->orderby('created_at','desc')->get();
        return view('admin.investments.index',compact('investments'));
    }

    public function pending(){
        $investments = $this->Investment->model()->where('status','Pending')->orderby('created_at','desc')->get();
        return view('admin.investments.pending',compact('investments'));
    }

    public function approve(Request $request){
        $data = $request->validate([
            'items' => 'required|string'
        ]);
        $items = explode(',',$data['items']);
        foreach($items as $item){
            $investment = $this->Investment->model()->where('id',$item)->first();
            if(!empty($investment)){
                $investment->admin_id = Auth::user()->id;
                $investment->start_date = now();
                $investment->end_date = $this->getBusinessDays(now() , $investment->duration);
                $investment->status = $this->activeStatus;
                $investment->save();

                //Send email to users
                $this->sendNotificationMail([
                    'title' => 'Investment Approved!',
                    'email' => $investment->user->email,
                    'description' => 'We are pleased to notify you that your investment request has been approved!',
                    'message' => 'Please check for the investment details with reference no. #'.$investment->reference,
                ]);
            }
        }
        return redirect()->back()->with('success_msg','Update completed successfully!');
    }

    public function getBusinessDays($start_date , $business_days){
        $holidays = ['01-01', '02-14', '06-01', '10-01', '12-25'];
        $finalDate = Carbon::parse($start_date);
        $finalDate->addWeekdays($business_days);

        for ($i = 1; $i <= $business_days; $i++) {
            if (in_array(date('m-d' , strtotime(Carbon::parse($start_date)->addWeekdays($i))), $holidays)) {
                $finalDate->addWeekday();
            }
        }
        return $finalDate;

    }

    public function extendInvestmentDate(Request $request){
        $data = $request->validate([
            'start' => 'required|string',
            'end' => 'required|string',
            'days' => 'required|string',
        ]);
        $start = Carbon::parse($data['start']);
        $end = Carbon::parse($data['end']);

        $investments = $this->Investment->model()->where('status',1)->whereBetween('start_date',[$start , $end])->get();
        foreach($investments as $investment){
            $investment->admin_id = Auth::user()->id;
            $investment->extension += $data['days'];
            $investment->end_date = $this->getBusinessDays($investment->end_date , $data['days']);
            $investment->save();

            //Send email to users
            $this->sendNotificationMail([
                'title' => 'Investment Duration Extended!',
                'email' => $investment->user->email,
                'description' => 'Due to the recent unfortunate trading experiences, it saddens us to notify you that your investment period has been extended by '.$data['days'].' days!',
                'message' => 'Please check for the investment details with reference no. #'.$investment->reference,
            ]);
        }
        return redirect()->back()->with('success_msg','Update completed successfully!');
    }
}
