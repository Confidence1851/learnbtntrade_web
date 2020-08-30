<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'referrer' => ['nullable', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'ref_code' => $this->ref_code(),
            'role' => $this->userRole,
            'status' => $this->activeStatus,
            'password' => Hash::make($data['password']),
        ]);

        if(!empty($code = $data['referrer'])){
            $ref = User::where('ref_code',$code)->first();
            Referral::create([
                'user_id' => $user->id,
                'referrer_id' => $ref->id,
                'type' => 0
            ]);
            $ref->wallet += 1;
            $ref->save();
        }

        return $user;
    }


    private function ref_code(){
            $token = getRandomToken(6);
            $check = User::where('ref_code',$token)->count();
            if($check == 0){
                return strtoupper($token);
            }
            return $this->ref_code();
    }

    public function ref_invite($code){
        $user = User::where('ref_code',$code)->first();
        if(empty($user)){
            $user = new User();
        }
        session([
            'ref_name' => $user->fullName(),
            'ref_code' => $user->ref_code,
        ]);
        return redirect()->route('register');
    }
}
