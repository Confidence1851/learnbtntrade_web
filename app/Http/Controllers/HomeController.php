<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $this->adminAccount();
        $user = Auth::user();
        // $user->sendApiEmailVerificationNotification();
        // dd(Session::get('error_msg'));
        $success_msg = Session::get('success_msg');
        $error_msg = Session::get('error_msg');
        // dd($error_msg);

        // if($user->role == 2 && $user->status == 1){  //if user is an admin
            return redirect()->route('admin_dashboard')->with('success_msg', $success_msg)->with('error_msg', Session::get('error_msg'));
        // }
        // if($user->role == 1 && $user->sub_role  == 1 && $user->status == 1){  //if user is a sub admin
        //     // return redirect()->route('sub_admin_dashboard');
        // }
        // if($user->role == 0 && $user->sub_role  == 1 && $user->status == 1){  //if user is a Agent
        //     return redirect()->route('user_dashboard')->with('success_msg',$success_msg )->with('error_msg', $error_msg );
        // }
        // return redirect('/');

    }

    public function admin_dashboard(){

        return view('admin.home');
    }


    public function sub_admin_dashboard(){
        return view('sub_admin.home');
    }
}
