<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(){
        $plans = Plan::where('status' , $this->activeStatus)->get();
        return view('web.plans' , compact('plans'));
    }
}
