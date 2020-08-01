<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('web.index');
    }

    public function contact_us(){
        return view('web.contact_us');
    }

    public function terms_of_use(){
        return view('web.terms_of_use');
    }

    public function how_we_work(){
        return view('web.how_we_work');
    }

    public function faqs(){
        return view('web.faqs');
    }

    public function privacy_policy(){
        return view('web.privacy_policy');
    }

    public function download_center(){
        $android = [
            'apk_1' => 'stakeguard_1.apk',
            'apk_2' => 'not_available',
            'apk_3' => 'not_available',
        ];

        return view('web.download_center' , compact('android'));
    }

    public function download_file($name){
       $file = public_path('apk/'.$name);

        if(file_exists($file)){
            return response()->download($file , 'Stakeguard.apk');
        }
        else{
            return redirect()->back()->with('error_msg' , 'Couldn`t download file!');
        }
    }

}
