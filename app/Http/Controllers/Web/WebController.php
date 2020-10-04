<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\NewsletterSubscriber;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        if(session()->has('homepage_data')){
            $stats = session()->get('homepage_data');
        }
        else{
            $stats = [
                'students' => $this->User->model()->where('role' , 0)->count(),
                'courses' => $this->Course->model()->where('status' , $this->activeStatus)->count(),
                'instructors' => $this->User->model()->where('role' , $this->instructorRole)->count(),
            ];
            session()->put('homepage_data' , $stats);
        }
        $testimonials = Testimonial::where('status' , $this->activeStatus)->get();  //->where('featured' , $this->activeStatus)
        return view('web.index' , compact('featuredCourses' , 'latestPosts' , 'stats' , 'testimonials'));
    }

    public function contact_us(){
        return view('web.contact_us');
    }

    public function crypto_haven(){
        return view('web.crypto_haven');
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
    public function read_file($path)
    {
        return getFileFromPrivateStorage(decrypt($path));
    }

    public function contact_form(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        Mail::to(env('CONTACT_MAIL_ADDRESS'))->send(new ContactMail($data));
        return response()->json([
            'success' => true,
            'msg' => 'Your message has been received!'
        ]);
    }

    public function subscribe_email(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
        ]);
        $check = NewsletterSubscriber::where('email' , $data['email'])->count();
        if($check > 0){
            return response()->json([
                'success' => false,
                'msg' => 'You already subscribed!'
            ]);
        }
        NewsletterSubscriber::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'You have successfully subscribed!'
        ]);
    }


}
