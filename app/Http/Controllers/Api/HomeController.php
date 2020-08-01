<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\HomeControl;
use Illuminate\Http\Request;

class HomeController extends HomeControl
{
    public function fetch_agents(){
        $data = $this->fetchAgents();
        return response()->json($data, $this->successResponse);
    }


    public function homepage_data(){
        $data = $this->fetchHomepageData();
        return response()->json($data, $this->successResponse);
    }
}
