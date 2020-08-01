<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class ProfileControl extends Controller
{
    public function profileData(){
        $user =  $this->User->user();
        return [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'gender' => $user->gender,
            // 'dob' => $user->dob,
            'country' => $user->country,
            'state' => $user->state,
        ];
    }

    public function getCountries(){
        $countries = $this->Country->all();
        return $countries;
    }

    public function getCountryStates($country_name){
        $country = $this->Country->model()->where('name',$country_name)->first();
        $states = $this->CountryState->model()->where('country_id',$country->id)->orderby('name' , 'asc')->get('name');
        return $states;
    }

    public function updateProfile(Request $request){
        $data = Validator::make($request->all(),[
            'name' => 'required|string',
            'phone' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            // 'dob' => 'required|string',
            'gender' => 'required|string',
        ]);

        if($data->fails()){
            return [
                'success' => false ,
                'msg'=> 'One or more fields required!',
                'code' => 400
            ];
        }

        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            // 'dob' => 'required|string',
            'gender' => 'required|string',
        ]);

        $user = $this->User->user();
        $user->update($data);

        return [
            'success' => true ,
            'msg'=> 'Profile updated succdessfully!',
            'code' => 200
        ];
    }

    public function getMynotifications(){
        $notifications = $this->Notification->model()->where('user_id',$this->User->user()->id)->orderby('created_at','desc')->get();
        return $notifications;
    }

    public function getMyReferralsHistory(){
        $referrals = $this->Referral->model()->where('referrer_id',$this->User->user()->id)->orderby('created_at','desc')->get();
        $refs = [];
        foreach($referrals as $ref){
           array_push($refs , [
               'id' => $ref->id,
               'name' => $this->User->model()->where('id',$ref->user_id)->first('name')->name,
               'created_at' => $ref->created_at
               ]);
        }
        return $refs;
    }
}




