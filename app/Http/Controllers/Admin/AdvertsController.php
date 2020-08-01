<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertsController extends Controller
{
    public function index(){
        $adverts = $this->Advert->model()->orderby('created_at','desc')->get();
        return view('admin.adverts.index',compact('adverts'));
    }


    public function pending(){
        $adverts = $this->Advert->model()->where('status','Pending')->orderby('created_at','desc')->get();
        return view('admin.adverts.pending',compact('adverts'));
    }

    public function create(){
        $users = $this->User->model()->where('status',1)->get();
        return view('admin.adverts.create' ,compact('users' ));
    }

    public function store(Request $request){
        // dd($request->all());
        $data = $this->validateRequest($request);
        $data['admin_id'] = $this->User->user()->id;
        $data['reference'] = time();
        $this->Advert->create($data);
        return redirect()->route('adverts.index')->with('success_msg', 'Advert created successfully!');
    }

    public function validateRequest(Request $request){
        return $request->validate([
            'merchant_id' => 'nullable|string',
            'name' => 'required|string',
            'company_name' => 'required|string',
            'title' => 'required|string',
            'email' => 'required|string|email',
            'description' => 'required|string',
            'type' => 'required|string',
            'host' => 'required|string',
            'status' => 'required|string',
            'start_date' => 'required|string',
            'stop_date' => 'required|string',
            'rate' => 'required|string',
            'url' => 'required|string',
            'discount' => 'nullable|string',
            'media_limit' => 'nullable|string',
        ]);
    }

    public function show($id){
        $advert = $this->Advert->model()->findorfail($id);
        return view('admin.adverts.show',compact('advert'));
    }

    public function edit($id){
        $advert = $this->Advert->model()->findorfail($id);
        $users = $this->User->model()->where('status',1)->get();
        return view('admin.adverts.edit' ,compact('users', 'advert'));
    }

    public function update(Request $request , $id){
        $advert = $this->Advert->model()->findorfail($id);
        $data = $this->validateRequest($request);
        $advert->update($data);
        return redirect()->route('adverts.show' , $id)->with('success_msg', 'Advert updated successfully!');
    }
}
