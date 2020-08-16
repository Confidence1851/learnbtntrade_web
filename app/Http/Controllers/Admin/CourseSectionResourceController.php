<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseSectionResourceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $section = $this->CourseSection->find($request->course_section_id);
        if(empty($section)){
            return redirect()->back()->with('error_msg', 'Couldn`t find section details!');
        }
        $data = $this->validateData($request);
        $this->CourseSectionResource->create($data);
        return redirect()->route('course.sections.show', $section->id)->with('success_msg', 'Resource created successfully!');
    }


    public function validateData($request , $id = null)
    {
        $file = $id == null ? 'nullable' : 'required';
        dd($request->all());
        $data = $request->validate([
            'course_section_id' => 'required|string',
            'filename' => 'required|string',
            'file' => $file.'|file|mimetypes:'.imageMimes().','.docMimes(),
            'status' => 'required|string',
        ]);

        if(!empty( $file = $request->file('file'))){
            $type = getFileType($file->getClientOriginalExtension());
            if(strtolower($type) == 'image'){
                $path = $this->courseSectionResourceImagePath;
            }
            if(strtolower($type) == 'video'){
                $path = $this->courseSectionResourceVideoPath;
            }
            if(strtolower($type) == 'document'){
                $path = $this->courseSectionResourceDocPath;
            }
            $size = bytesToHuman(File::size($file));
            $data['file'] = putFileInPrivateStorage($file , $path);
            $data['size'] = $size;
            $data['type'] = $type;
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
        $resource = $this->CourseSectionResource->find($id);
        return downloadFileFromPrivateStorage($resource->file , $resource->filename);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $section = $this->CourseSection->find($id);
        // $courses = $this->Course->model()->where('status' , $this->activeStatus)->get();
        // return view('admin.course_sections.edit', compact('section' , 'courses'));
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
        $section = $this->CourseSectionResource->find($id);
        if(empty($section)){
            return redirect()->back()->with('error_msg', 'Couldn`t find resource details!');
        }
        $data = $this->validateData($request , $id);
        $this->CourseSectionResource->update($id , $data);
        return redirect()->back()->with('success_msg', 'Resource updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = $this->CourseSectionResource->find($id);
        try{
            if(!empty($resource->file)){
               deleteFileFromPrivateStorage($resource->file);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete resource file from storage!');
        }
        $this->CourseSectionResource->delete($resource->id);
        return redirect()->back()->with('success_msg', 'Course section resource deleted successfully!');
    }
}
