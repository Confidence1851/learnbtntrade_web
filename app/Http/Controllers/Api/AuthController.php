<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($data)) {
            $user = $this->User->user();
            // $userTokens = DB::table('oauth_access_tokens')->where('user_id',$user->id)->get();
            $userTokens = $user->tokens;

            foreach($userTokens as $token){
                // $token->revoke();
                $token->delete();
            }
            $token = $user->createToken('PersonalAccessToken')->accessToken;

            $returnData['token'] = $token ;
            $returnData['user'] = ['name' => $user->name , 'account_no' => $user->account_no ] ;

            // $this->sendNotificationMail([
            //     'title' => 'New Login Notification!',
            //     'email' => $user->email,
            //     'description' => 'We detected a new login acivity on you account!',
            //     'message' => '',
            // ]);
            return response()->json(['success' => true, 'msg' => $returnData,], $this->successResponse);
        } else {
            return response()->json(['success' => false, 'msg' => 'Incorrect details, try again!'], $this->validationErrorResponse);
        }
        return response()->json(['success' => false, 'msg' => 'An error occurred!' ], $this->serverErrorResponse);
    }

    /**
     * Validate token api
     *
     * @return \Illuminate\Http\Response
     */
    public function validateToken(){
        return ['message' => true];
    }


    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:6',],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'data' => $validator->errors()], $this->validationErrorResponse); //$validator->errors()
        }

        DB::beginTransaction();

        try{

            $user = $this->User->create([
                'name' => $request['name'],
                'email' => $request['email'],
                'account_no' => $this->account_no(),
                'role' => 0,
                'password' => Hash::make($request['password']),
            ]);



            $this->sendVerificationEmail($user->id);
            // $user->sendApiEmailVerificationNotification();
            DB::commit();
            return response()->json(['success' => true, 'msg' => $user ], $this->successResponse);

        }
        catch(\Exception $e){
            DB::rollback();
             return response()->json(['success' => false, 'msg' => $e->getMessage() ], $this->validationErrorResponse);
        }
    }

    public function validate_token(){
        $user = $this->User->user();
        return response()->json(['valid' => $user->id],$this->successResponse);
    }


    public function sendVerificationEmail($id = null){
        if(is_null($id)){
            $user = $this->User->user();
        }
        else{
            $user = $this->User->find($id);
        }
        if(!empty($user)){
            $pin = rand(111111 , 999999);
            $this->VerificationPin->create([
                'user_id' => $user->id,
                'pin' => encrypt($pin),
            ]);

            $this->sendNotificationMail([
                'title' => 'It`s time to verify your email!',
                'subject' => 'Email Verification Pin!',
                'email' => $user->email,
                'description' => 'You are one step closer to validating your account. Kindly copy the pin below to verify your email address. Pin expires in 5 minutes.',
                'message' => '<div class="text-center"><b>Verification pin: '.$pin.'</b></div>',
            ]);
        }

        return response()->json(['success' => true, 'msg' => 'OTP re-sent successfully! Pin would expire in 5 minutes.' ], $this->successResponse);
    }

    protected function confirmVerificationPin(Request $request){
        $validator = Validator::make($request->all(), [
            'pin' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'data' => $validator->errors()], $this->validationErrorResponse); //$validator->errors()
        }

        $user = $this->User->user();
        $pin = $this->VerificationPin->model()->where('user_id' , $user->id)->orderby('created_at' , 'desc')->first();
        if(empty($pin)){
            return response()->json(['success' => false, 'msg' => 'Couldn`t verify pin!' ], $this->successResponse);
        }
        else{
            if(Carbon::parse($pin->created_at)->diffInMinutes(now()) > 5){
                $pin->delete();
                return response()->json(['success' => false, 'msg' => 'Sorry, this pin has expired!' ], $this->successResponse);
            }
            else{
                if(decrypt($pin->pin) != $request->pin){
                    return response()->json(['success' => false, 'msg' => 'Incorrect pin entered!' ], $this->successResponse);
                }
                else{
                    $pin->delete();
                    return response()->json(['success' => true, 'msg' => 'Confirmed!' ], $this->successResponse);
                }
            }
        }
    }

    public function verifyEmail(Request $request){
        $response = $this->confirmVerificationPin($request);
        if($response->getData()->success){
           $this->verify_email();
        }
        return $response;
    }




    // Steps include referral_code , upload_document , complete_profile , transaction_settings
    public function account_status_check(){
        $user = $this->User->user();
        $steps = array();
        // Steps include referral_code , upload_document , complete_profile , transaction_settings
        if(empty($user->email_verified_at)){
            array_push($steps ,[
                'title' => 'Verify Email Address',
                'message' => 'Log into your email and find the OTP sent to your inbox or spam folder to verify your email address.',
                'type' => 'email_verification',
            ]);
        }

        if(empty($user->referred)){
            array_push($steps ,[
                'title' => 'Reward your referrer',
                'message' => 'Enter your referral code so they can feel the joy of sharing. Skip this if you dont have one.',
                'type' => 'referral_code',
            ]);
        }

        if(empty($user->gender) || empty($user->country) || empty($user->state)){
            array_push($steps ,[
                'title' => 'Complete your profile',
                'message' => 'Some important details are missing from your profile. Kindly complete your profile.',
                'type' => 'complete_profile',
            ]);
        }

        $status = true;
        $user->status = 1;
        if(count($steps) > 0){
            $status = false;
            $user->status = 0;
        }
        $user->save();

        $check = [
            'pass' =>  $status,
            'header' => 'Finishing touches..',
            'title' => 'Your account is almost ready!',
            'steps' => $steps,
        ];
        return response()->json($check,$this->successResponse);
    }

    public function reward_referrer(Request $request){
        $validator = Validator::make($request->all(), [
            'referrer' => ['nullable', 'string', 'max:50'],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'msg' => 'Invalid referral!'], $this->validationErrorResponse);
        }

        $user = $this->User->user();

        if(empty($user->referrer)){
            if(!empty($request['referrer'])){
                $referrer = $this->User->model()->where('account_no' , $request['referrer'])->first();
                $type = 0;
            }
            if(empty($referrer)){
                $referrer = $this->ceoAccount();
                $type = 1;
            }
            try{
                $this->Referral->create([
                    'user_id' => $user->id,
                    'referrer_id' => $referrer->id,
                    'type' => $type,
                ]);
            }
            catch(\Exception $e){
                $this->logError('Create referral' , $e->getMessage());
            }
        }

        return response()->json(['success' => true, 'msg' => 'Submitted Successfully!' ], $this->successResponse);

    }


    public function finish_account_setup(Request $request){
        $validator = Validator::make($request->all(), [
            'referrer_code' => ['nullable', 'string', 'max:50'],
            // 'id_document' => ['nullable', 'string', 'image'],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'data' => $validator->errors()], $this->validationErrorResponse);
        }

        $user = $this->User->user();

        if(empty($user->referrer)){
            $referrer = '';
            if(!empty($request['referrer_code'])){
                $referrer = $this->User->model()->where('account_no' , $request['referrer_code'])->first();
                $type = 0;
            }
            if(empty($referrer)){
                $referrer = $this->User->model()->where('email' , 'ugoloconfidence@gmail.com')->first() ?? $this->User->model()->first();
                $type = 1;
            }
            $this->Referral->create([
                'user_id' => $user->id,
                'referrer_id' => $referrer->id,
                'type' => $type,
            ]);
        }

        return response()->json(['success' => true, 'msg' => 'Submitted Successfully!' ], $this->successResponse);

    }




    use VerifiesEmails;
    /**
    * Show the email verification notice.
    *
    */
    public function show()
    {
    //
    }

    /**
    * Mark the authenticated user’s email address as verified.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    protected function verify_email() {
        $user = $this->User->user();
        $date = date('Y-m-d g:i:s');
        $user->email_verified_at = $date; // to enable the “email_verified_at field of that user be a current time stamp by mimicing the must verify email feature
        $user->save();
        return response()->json('Email verified!');
    }

    /**
    * Resend the email verification notification.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function resend_email(Request $request){
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json('User already have verified email!', $this->validationErrorResponse);
        }
        $request->user()->sendEmailVerificationNotification();
        return response()->json('The notification has been resubmitted');
    }

}
