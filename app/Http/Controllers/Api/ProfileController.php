<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\ProfileControl;
use Illuminate\Http\Request;

class ProfileController extends ProfileControl
{
    public function profile_details(){
        $data = $this->profileData();
        return response()->json($data, $this->successResponse);
    }

    public function get_countries(){
        $data = $this->getCountries();
        return response()->json($data, $this->successResponse);
    }

    public function get_country_states($country_name){
        $data = $this->getCountryStates($country_name);
        return response()->json($data, $this->successResponse);
    }

    public function update_profile(Request $request){
        $data = $this->updateProfile($request);
        return response()->json($data ,$data['code']);
    }

     public function fetch_notifications(){
        $data = $this->getMynotifications();
        return response()->json($data, $this->successResponse);
    }

     public function fetch_referral_history(){
        $data = $this->getMyReferralsHistory();
        return response()->json($data, $this->successResponse);
    }

}
