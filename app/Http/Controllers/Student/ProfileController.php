<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        $user = $this->User->user();
        $referrals = $this->Referral->model()
                ->where('referrer_id' , $user->id)
                ->orderby('created_at' , 'desc')
                ->get();
        $withdrawals = Withdrawal::where('user_id' , $user->id)
                ->orderby('created_at' , 'desc')
                ->get();
                
        return view('student.profile', compact('user' , 'referrals' , 'withdrawals'));
    }

    public function update(Request $request)
    {
        $user = $this->User->user();
        if(empty($user)){
            return redirect()->back()->with('error_msg', 'User data not found!');
        }
        // dd($request->all());
        if(!empty($request->file('avatar'))){
            deleteFileFromPrivateStorage($user->getAvatar());
        }
        $data = $this->validateData($request);

        $this->User->update($user->id , $data);
        return redirect()->back()->with('success_flash', 'Profile updated successfully!');
    }

    private function validateData($request){
        // dd($request->all());
        $data = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'phone' => 'nullable|string',
            'gender' => 'required|string',
            'country' => 'required|string',
            'state' => 'nullable|string',
            'address' => 'nullable|string',
            'avatar' => 'nullable|file|mimetypes:'.imageMimes(),
        ]);

        if(!empty( $image = $request->file('avatar'))){
            // dd($image);
            $data['avatar'] = putFileInPrivateStorage($image , $this->userImagePath);
        }

        return $data;
    }

    public function password_reset (Request $request)
    {
        $data = $request->validate([
            'oldpassword' => 'required|string',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',
        ]);

        $user = $this->User->user();

        if(Hash::check($request['oldpassword'], $user->password)){
            return redirect()->back()->with('error_flash', 'Old password is incorrect!');
        }

        if($request['password'] !== $request['password_confirmation']){
            return redirect()->back()->with('error_flash', 'Passwords do not match!');
        }

        $this->User->update($user->id,['password' => Hash::make($request->password) ]);
        return redirect()->back()->with('success_flash', 'Password updated successfully!');

    }

    public function bank_account (Request $request)
    {
        $data = $request->validate([
            'bank_name' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|string',
        ]);
        $user = $this->User->user();
        $check = BankAccount::where('account_number' , $data['account_number'])->whereNotIn('user_id',[$user->id])->count();
        if($check > 0){
            return redirect()->back()->with('error_flash', 'Account details used by someone else!');
        }
        $bank = BankAccount::where('user_id', $user->id)->first();
        if(!empty($bank)){
            $bank->update($data);
        }
        else{
            $data['user_id'] = $user->id;
            BankAccount::create($data);
        }
        return redirect()->back()->with('success_flash', 'Account details updated successfully!');

    }
}
