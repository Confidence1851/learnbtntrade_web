<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $featuredCourses = $this->Course->model()
            ->where('status' , $this->activeStatus)
            ->where('featured' , $this->activeStatus)
            ->inRandomOrder()->limit(4)
            ->get();

        $latestPosts = $this->Post->model()->where('status' , $this->activeStatus)
            ->where('featured', $this->activeStatus)
            ->limit(12)
            ->get();
        $stats = [
            'students' => 20,
            'courses' => 40,
            'instructors' => 10,
        ];
        return view('web.index' , compact('featuredCourses' , 'latestPosts' , 'stats'));
    }

    public function contact_us(){
        return view('web.contact_us');
    }

    public function about_us(){
        return view('web.about_us');
    }

    public function terms_and_conditions(){
        return view('web.terms_and_conditions');
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

    /**
     * Returns user avatar
     *
     * @return \Illuminate\Http\Response
     */
    public function userAvatar($path)
    {
        // dd(decrypt($path));
        return getFileFromPrivateStorage(decrypt($path));
    }


}
