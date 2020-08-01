<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        return view('admin.home');
    }

    public function referrals(){
        $referrals = $this->Referral->model()->orderby('created_at','desc')->get();
        return view('admin.referral.index',compact('referrals'));
    }
}
