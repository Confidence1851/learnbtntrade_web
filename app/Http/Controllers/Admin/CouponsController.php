<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Repositories\CouponRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->Coupon->model()->orderby('created_at','desc')->get();
        // foreach($coupons as $coupon){
        //     $coupon['card_no'] = Str::limit($coupon->card_no,7,'XXX');
        //     if(!empty($coupon->user_id)){
        //         $coupon['used'] = false;
        //     }
        //     else{
        //         $coupon['used'] = true;
        //     }
        // }
        return view('admin.coupons.index',compact('coupons'));
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
            'agent_id' => 'required',
            'amount' => 'required',
        ]);
        $request->validate([
            'quantity' => 'required',
        ]);
        $data['batch_no'] = time();
        $data['user_id'] = null;
        $quantity = $request['quantity'];

        DB::beginTransaction();
        try{
            for($i = 0;$i < $quantity; $i++){
                $this->create_coupon($data);
            }
            $this->adminLog('generated '.$request['quantity'].' new coupon codes', 'Coupon', route('coupons.index'));
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            $this->ErrorLog->create([
                'action' => 'Create Coupon',
                'error' => $e->getMessage(),
            ]);
        }
        return redirect()->back()->with('success_msg', $quantity.' coupons generated successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $coupon = Coupon::findorfail($id);
        // $coupon['card_no'] = Str::limit($coupon->card_no,7,'XXX');
        // return view('admin.coupons.show',compact('coupon'));
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
}
