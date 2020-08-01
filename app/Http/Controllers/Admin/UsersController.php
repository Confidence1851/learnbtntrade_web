<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->User->all();
        return view('admin.user_management.users.users',compact('users'));
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
        $user = $this->User->find($id);
        // dd($user);
        $investments = $this->Investment->model()->where('user_id',$user->id)->orderby('created_at','desc')->get();
        $transactions = $this->Transaction->model()->where('user_id',$user->id)->orderby('created_at','desc')->get();
        $withdrawalRequests = $this->Withdrawal->model()->where('user_id',$user->id)->orderby('created_at','desc')->get();
        $referrals = $this->Referral->model()->where('referrer_id',$user->id)->orderby('created_at','desc')->get();
        $activities = $this->Activity->model()->where('user_id',$user->id)->orderby('created_at','desc')->get();

        $bank = $this->User->user()->bank;
        if(empty($bank)){
            $bank = $this->BankAccount->model();
        }

        return view('admin.user_management.users.user_info',compact('referrals','activities','user','investments','transactions','withdrawalRequests','bank'));
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

    public function processing()
    {
        $users = $this->User->model()->where('status' , $this->processingStatus)->get();
        return view('admin.user_management.users.processing',compact('users'));
    }
}
