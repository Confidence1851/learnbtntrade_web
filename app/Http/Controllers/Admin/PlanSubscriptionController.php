<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanSubscription;
use Illuminate\Http\Request;

class PlanSubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions =PlanSubscription::get();
        return view('admin.plan_subscriptions.index',compact('subscriptions'));
    }
}
