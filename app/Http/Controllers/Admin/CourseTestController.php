<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseTest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseTestController extends Controller
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
    public function create($id)
    {
        $courses = $this->Course->model()->where('status' , $this->activeStatus)->get();
        return view('admin.course_tests.create' , compact('id' , 'courses'));
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
            return redirect()->back()->with('error_msg', 'We couldn`t validate data!');
        }

        $data['user_id'] = auth('web')->id();
        CourseTest::create($data);
        return redirect()->route('course.details.show', $course->id)->with('success_msg', 'Course test created successfully!');
    }

    public function validateData($request)
    {
        $data = $request->validate([
            'course_id' => 'required|string',
            'difficulty' => 'required|string',
            'duration' => 'required|string',
            'title' => 'required|string',
            // 'file' => 'nullable|mimetypes:'.imageMimes().','.docMimes(),
            'status' => 'required|string',
        ]);
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
        $test = CourseTest::findorfail($id);
        return view('admin.course_tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = CourseTest::findorfail($id);
        $courses = $this->Course->model()->where('status' , $this->activeStatus)->get();
        return view('admin.course_tests.edit', compact('test' , 'courses'));
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
        $test = CourseTest::findorfail($id);

        $data = $this->validateData($request , $id);
        if($data == false){
            return redirect()->back()->with('error_msg', 'We couldn`t validate data!');
        }

        $test->update($data);
        $test->questions->update(['course_id' , $test->course_id]);
        return redirect()->route('course.test.details.show' , $test->course_id)->with('success_msg', 'Course test details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test =CourseTest::findorfail($id);
        $test->delete();
        return redirect()->back()->with('success_msg', 'Course test deleted successfully!');
    }

}
