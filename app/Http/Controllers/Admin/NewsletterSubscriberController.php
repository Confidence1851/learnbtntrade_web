<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsLetter;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewsletterSubscriberController extends Controller
{


    public function index(){
        $emails = NewsletterSubscriber::orderby('created_at','desc')->get();
        return view('admin.newsletter.index',compact('emails'));
    }

    public function create(){
        $emails = NewsletterSubscriber::orderby('name','asc')->get();
        return view('admin.newsletter.new',compact('emails'));
    }

    public function send(Request $request){

        $data = $request->validate([
            'title' => 'nullable|string',
            'subject' => 'nullable|string',
            'message' => 'nullable|string',
            'recipients' => 'nullable|string'

          ]);
         $recipients = explode(',',$data['recipients']);
        //  dd($recipients);
         $emails = array();
         foreach($recipients as $recipient){
             array_push($emails,NewsletterSubscriber::where('id',$recipient)->first());
         }


        //  dd($emails);
         foreach($emails as $email){
             $name = $email->name;
             $data['email'] = $email->email;
             $data['subject'] = Str::replaceArray('{{name}}', [$name,$name,$name,$name,$name,$name,$name,$name,$name,$name] ,$data['subject']);
             $data['message'] = Str::replaceArray('{{name}}', [$name,$name,$name,$name,$name,$name,$name,$name,$name,$name] ,$data['message']);
             // dump($data);
             Mail::to($data['email'])->send(new NewsLetter($data));
             $data['subject'] = $request['subject'];
             $data['message'] = $request['message'];
         }
         // dd('');
         return redirect()->back()->withStatus(__('Letter successfully sent to '.count($emails).' email address(es)!'));
     }

     public function unsubscribe($email){

          $find_email = NewsletterSubscriber::where('email',$email)->first();
          if(empty($find_email)){
              $msg = 'Sorry, your email wasn`t found on our list! ';
              return view('web.unsubscribe',compact('msg'));
          }
         $find_email->delete();
         $msg = 'You have successfully unsubscribed from our mailing list!';
         return view('',compact('msg'));
     }

     public function delete_subscriber($subscriber){
        NewsletterSubscriber::findorfail($subscriber)->delete();
        return redirect()->back()->withStatus(__('Subscriber successfully deleted.'));
     }

}
