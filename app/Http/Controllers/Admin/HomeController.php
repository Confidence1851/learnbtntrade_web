<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Signal;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $count = [
            'users' => $this->User->model()->count(),
            'posts' => $this->Post->model()->count(),
            'courses' => $this->Course->model()->count(),
            'orders' => Order::count(),
            'instructors' => $this->User->model()->where('role' , $this->instructorRole)->count(),
            'bloggers' => $this->User->model()->where('role' , $this->bloggerRole)->count(),
            'plans' =>Plan::count(),
            'signals' =>Signal::count(),
        ];

        $recentCourses = $this->Course->model()->orderby('created_at' , 'desc')->limit(10)->get();
        $recentPosts = $this->Post->model()->orderby('created_at' , 'desc')->limit(10)->get();
        return view('admin.home' , compact('recentCourses' , 'recentPosts' , 'count'));
    }

    public function referrals(){
        $referrals = $this->Referral->model()->orderby('created_at','desc')->get();
        return view('admin.referral.index',compact('referrals'));
    }

}
