<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CourseSectionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sections = $this->CourseSection->all();
        // return view('admin.course_sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $courses = $this->Course->model()->where('status' , $this->activeStatus)->get();
        return view('admin.course_sections.create' , compact('id' , 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = $this->Course->find($request->course_id);
        if(empty($course)){
            return redirect()->back()->with('error_msg', 'Couldn`t find course details!');
        }
        $data = $this->validateData($request);
        if($data == false){
            return redirect()->back()->with('error_msg', 'Section title already exists!');
        }
        $data['slug'] = Str::slug($data['title']);
        $this->CourseSection->create($data);
        return redirect()->route('course.details.show', $course->id)->with('success_msg', 'Course section created successfully!');
    }


    public function validateData($request, $id = null)
    {
        $video = $id == null ? 'nullable' : 'required';
        $data = $request->validate([
            'course_id' => 'required|string',
            'title' => 'required|string',
            'video' => $video.'|file|mimetypes:video/mp4,video/avi',
            'number' => 'required|string',
            'duration' => 'required|string',
            'status' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        $count = 0 ;
        if(!empty($id)){
            $section = $this->CourseSection->find($id);
            if(strtolower($section->title) == strtolower($data['title']) ){
                //
            }
            else{
                $count = $this->CourseSection->model()->where('title' , $data['title'])->count();
            }
        }
        else{
            $count = $this->CourseSection->model()->where('title' , $data['title'])->count();
        }

        if($count > 0){
            return false;
        }


        if(!empty( $video = $request->file('video'))){
            $size = bytesToHuman(File::size($video));
            $data['video'] = putFileInPrivateStorage($video , $this->courseSectionVideoPath);
            $data['size'] = $size;
        }
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
        $section = $this->CourseSection->find($id);
        return view('admin.course_sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = $this->CourseSection->find($id);
        $courses = $this->Course->model()->where('status' , $this->activeStatus)->get();
        return view('admin.course_sections.edit', compact('section' , 'courses'));
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
        $section = $this->CourseSection->find($id);

        $data = $this->validateData($request , $id);
        if($data == false){
            return redirect()->back()->with('error_msg', 'Section title already exists!');
        }
        try{
            if(!empty($request['video'])){
                deleteFileFromPrivateStorage($section->video);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old section video!');
        }
        $data['slug'] = Str::slug($data['title']);
        $this->CourseSection->update($section->id ,$data);
        return redirect()->route('course.details.show' , $section->course_id)->with('success_msg', 'Course section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = $this->CourseSection->find($id);
        if($section->Courses->count() > 0){
            return redirect()->back()->with('error_msg', 'Cant delete section because it has some Courses. Delete Courses first!');
        }
        try{
            if(!empty($section->video)){
               deleteFileFromPrivateStorage($section->video);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old section video!');
        }
        $this->CourseSection->delete($section->id);
        return redirect()->back()->with('success_msg', 'Course section deleted successfully!');
    }

    public function section_file($id)
    {
        $section = $this->CourseSection->find(decrypt($id));
        return getFileFromPrivateStorage($section->video);
    }
}
