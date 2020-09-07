<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PlanSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(100);
        return view('admin.orders.details.index' , compact('orders'));
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
        $order = Order::findorfail($id);
        return view('admin.orders.details.show' , compact('order'));
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


    public function download_receipt($id)
    {
        $order = Order::findorfail($id);
        return downloadFileFromPrivateStorage($this->orderReceiptsFilePath.'/'.$order->file , 'Order_Recipt_'.$order->reference);
    }


    public function status($id)
    {
        $order = Order::findorfail($id);

        if($order->status == $this->pendingStatus){
            $order->status = $this->activeStatus;
        }
        else{
            $order->status = $this->pendingStatus;
        }
        foreach($order->items as $item){
            if(!empty($item->course_id)){
                if(!empty($course = $item->course)){
                   
                }
            }
            else{
                if(!empty($plan = $item->plan)){
                    $planSub = PlanSubscription::where('order_item_id' , $item->id)->where('plan_id' , $plan->id)->first();
                    if(empty($planSub)){
                        PlanSubscription::create([
                            'user_id' => $item->user_id,
                            'plan_id' => $plan->id,
                            'order_item_id' => $item->id,
                            'start' => now(),
                            'stop' => $plan->duration == 'Lifetime' ? $plan->duration : Carbon::now()->addDays($plan->duration),
                            'status' =>  $order->status,
                            'comment' => $order->comment,
                            'phone_no' => $order->phone_no,
                        ]);
                    }
                    else{
                        $planSub->status =  $order->status;
                        $planSub->save();
                    }
                }
            }

        }


        $order->save();
        return redirect()->back()->with('success_msg', 'Order and all related plan subscriptions updated successfully!');
    }
}
