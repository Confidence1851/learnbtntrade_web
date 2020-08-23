<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->Course->all();
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->CourseCategory->model()->where('status' , $this->activeStatus)->get();
        return view('admin.courses.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        if(array_key_exists('error',$data)){
            return redirect()->back()->with('error_msg' , $data['error']);
        }
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = auth('web')->user()->id;
        $data['code'] = $this->course_code();
        $course = $this->Course->create($data);
        return redirect()->route('course.details.show',$course->id)->with('success_msg', 'courses course created successfully!');
    }


    private function course_code(){
        $token = getRandomToken(6);
        $check =  $this->Course->model()->where('code',$token)->count();
        if($check == 0){
            return strtoupper($token);
        }
        return $this->ref_code();
    }


    public function validateData($request , $id = null )
    {
        // dd($request->all());
        $data = $request->validate([
            'course_category_id' => 'required|string',
            'title' => 'required|string',
            'image' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/svg',
            'description' => 'required|string',
            'status' => 'required|string',
            'featured' => 'required|string',
            'price' => 'required|string',
            'discount' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);
        $count = 0 ;
        if(!empty($id)){
            $course = $this->Course->find($id);
            if(strtolower($course->title) == strtolower($data['title']) ){
                //
            }
            else{
                $count = $this->Course->model()->where('title' , $data['title'])->count();
            }
        }
        else{
            $count = $this->Course->model()->where('title' , $data['title'])->count();
        }
        if($count > 0){
            return ['error' => 'Course title already exists!'];
        }

        if(!empty( $image = $request->file('image'))){
            $data['image'] = resizeImageandSave($image , $this->coursePreviewImagePath , 'local' , 640 , 360);
        }
        $data['discount'] =  empty($data['discount']) ? 0 : $data['discount'];
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = $this->Course->find($id);
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->CourseCategory->all();
        $course = $this->Course->find($id);
        return view('admin.courses.edit', compact('course' , 'categories'));
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
        $course = $this->Course->find($id);

        $data = $this->validateData($request , $id);
        if(array_key_exists('error',$data)){
            return redirect()->back()->with('error_msg' , $data['error']);
        }
        try{
            if(!empty($request['image'])){
                deleteFileFromPrivateStorage($course->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old course  image!');
        }
        $data['slug'] = Str::slug($data['title']);
        $this->Course->update($course->id ,$data);
        return redirect()->route('course.details.show',$course)->with('success_msg', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = $this->Course->find($id);
        try{
            if(!empty($course->image)){
                deleteFileFromStorage($course->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old course image!');
        }
        $this->Course->delete($course->id);
        return redirect()->back()->with('success_msg', 'Course deleted successfully!');
    }
}
