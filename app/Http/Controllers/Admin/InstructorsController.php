<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstructorRequest;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors  =  InstructorRequest::get();
        $title = 1;
        return view('admin.user_management.instructors.requests', compact('instructors' , 'title'));
    }

    public function requests()
    {
        $instructors  =  InstructorRequest::where('status' , 0)->get();
        $title = 0;
        return view('admin.user_management.instructors.requests', compact('instructors' , 'title'));
    }

    public function status(Request $request)
    {
        $instructor = InstructorRequest::findorfail($request->r_id);
        if($instructor->status == 1){
            $instructor->status = 0 ;
        }
        else{
            $instructor->status = 1 ;
        }
        $instructor->save();
        return redirect()->back()->with('success_msg', 'Status changed successfully!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = InstructorRequest::findorfail($id)->delete();
        return redirect()->back()->with('success_msg', 'Status changed successfully!');
    }
}
