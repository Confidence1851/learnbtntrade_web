<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->User->all();
        $title = "ALL USERS";
        return view('admin.user_management.users.users',compact('users','title'));
    }

    public function enrolled()
    {
        $users = $this->User->all();
        $title = "ENROLLED USERS";
        return view('admin.user_management.users.users',compact('users','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->User->find($id);
        // dd($user);
        // $investments = $this->Investment->model()->where('user_id',$user->id)->orderby('created_at','desc')->get();
        // $transactions = $this->Transaction->model()->where('user_id',$user->id)->orderby('created_at','desc')->get();
        // $withdrawalRequests = $this->Withdrawal->model()->where('user_id',$user->id)->orderby('created_at','desc')->get();
        // $activities = $this->Activity->model()->where('user_id',$user->id)->orderby('created_at','desc')->get();

        $orders = Order::where('user_id' , $user->id)->orderby('created_at','desc')->get();
        $orderedItems = OrderItem::where('user_id' , $user->id)->orderby('created_at','desc')->get();
        $referrals = $this->Referral->model()->where('referrer_id',$user->id)->orderby('created_at','desc')->get();



        return view('admin.user_management.users.user_info',compact('referrals','orderedItems','user','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->User->find($id);
        if(empty($user)){
            return redirect()->back()->with('error_msg', 'User data not found!');
        }
        // dd($request->all());
        if(!empty($request->file('avatar'))){
            deleteFileFromPrivateStorage($user->getAvatar());
        }
        $data = $this->validateData($request);

        $this->User->update($id , $data);
        return redirect()->back()->with('success_msg', 'User data updated successfully!');
    }

    private function validateData($request , $mode = 'required'){
        // dd($request->all());
        $data = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => $mode.'|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'country' => 'required|string',
            'state' => 'nullable|string',
            'role' => $mode.'|string',
            'avatar' => 'nullable|file|mimetypes:'.imageMimes(),
            'status' => 'required|string',

        ]);

        if(!empty( $image = $request->file('avatar'))){
            $data['avatar'] = resizeImageandSave($image , $this->userImagePath , 'local' , 360 , 360);
        }

        return $data;
    }

    public function password_reset (Request $request, $id)
    {

        $data = $request->validate([
            'password' => 'required|string',
            'password_confirmation' => 'required|string',
        ]);

        if($request['password'] !== $request['password_confirmation']){
        return redirect()->back()->with('error_msg', 'Passwords dont match!');
        }

        $this->User->update($id,['password' => Hash::make($request->password) ]);
        return redirect()->back()->with('success_msg', 'User password updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function processing()
    {
        $users = $this->User->model()->where('status' , $this->processingStatus)->get();
        return view('admin.user_management.users.processing',compact('users'));
    }


    public function editProfile(){
        $user = $this->User->user();
        return view('profile.edit', compact('user'));
    }

    public function updateProfile(Request $request){
        $user = $this->User->user();

        if(!empty($request->file('avatar'))){
            deleteFileFromPrivateStorage($user->getAvatar());
        }
        $data = $this->validateData($request , 'nullable');

        $this->User->update($user->id , $data);
        return redirect()->back()->with('success_msg', 'Profile updated successfully!');
    }


    public function profile_password_reset (Request $request)
    {
        $data = $request->validate([
            'oldpassword' => 'required|string',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',
        ]);

        $user = $this->User->user();

        if(Hash::check($request['oldpassword'], $user->password)){
            return redirect()->back()->with('error_msg', 'Old password is incorrect!');
        }

        if($request['password'] !== $request['password_confirmation']){
            return redirect()->back()->with('error_msg', 'Passwords dont match!');
        }

        $this->User->update($user->id,['password' => Hash::make($request->password) ]);
        return redirect()->back()->with('success_msg', 'Password updated successfully!');

    }

}
