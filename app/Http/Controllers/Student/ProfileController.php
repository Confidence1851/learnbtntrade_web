<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        $user = $this->User->user();
        return view('student.profile', compact('user'));
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
}
