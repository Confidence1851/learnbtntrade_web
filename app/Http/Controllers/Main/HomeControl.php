<?php

namespace App\Http\Controllers\Main;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

abstract class HomeControl extends Controller
{
    public function fetchHomepageData(){
        $user = $this->User->user();
        $adverts = $this->Advert->model()->where('type' , 'banner')->where('status' , $this->activeStatus)->get();
        $transactions = $this->Transaction->model()->where('user_id',$user->id)->orderby('created_at','desc')->take(5)->get();
        $banners = [];
        foreach($adverts as $advert){
            foreach($advert->media as $media){
                array_push($banners , ['link' => $media->url ?? $advert->url ?? url('/') , 'image' => $media->mediaFile() ]);
            }
        }
        if(!empty($banners)){
            shuffle($banners);
        }
        return [
            'banners' => $banners,
            'announcement' => null,
            'announcements' => [],
            'transactions' => $transactions,
        ];
    }

    public function fetchAgents(){
        $agents = $this->Agent->model()->where('status', 1)->get([ 'id' , 'user_id' , 'display_name' , 'whatsapp_no' , 'department']);  //[ 'id' , 'user_id' ,' display_name',  'whatsapp_no']
        foreach($agents as $agent){
            $agent->name = $agent->display_name ?? $agent->user->name ?? '';
            $agent->phone = $agent->whatsapp_no ;
            $agent->whatsapp_url = 'https://wa.me/'.$agent->whatsapp_no ;

            $agent->avatar = $agent->user->avatar ?? '';
            if(empty($agent->avatar)){
                $agent['avatar'] = 'https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659651_960_720.png' ;
            }
            unset($agent['user']);
        }

        return $agents;
    }


}
