<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseTest;
use App\Models\CourseTestQuestion;
use Illuminate\Http\Request;

class CourseTestQuestionController extends Controller
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
        $test = CourseTest::findorfail($id);
        return view('instructor.course_test_questions.create' , compact('test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = CourseTest::findorfail($request->course_test_id);
        if(empty($test)){
            return redirect()->back()->with('error_msg', 'Couldn`t find test details!');
        }
        $data = $this->validateData($request);
        if($data == false){
            return redirect()->back()->with('error_msg', 'We couldn`t validate data!');
        }
        $data['course_id'] = $test->course_id;
        CourseTestQuestion::create($data);
        return redirect()->route('course.test.details.show' , $test->id)->with('success_msg', 'Course test question added successfully!');
    }

    public function validateData($request)
    {
        $data = $request->validate([
            'course_test_id' => 'required|string',
            'question' => 'required|string',
            'type' => 'required|string',
            'a' => 'nullable|string',
            'b' => 'nullable|string',
            'c' => 'nullable|string',
            'd' => 'nullable|string',
            'answer' => 'nullable|string',
            'duration' => 'nullable|string',
            'file' => 'nullable|mimetypes:'.imageMimes().','.docMimes(),
            'status' => 'required|string',
        ]);

        if(!empty( $file = $request->file('file'))){
            $data['file'] = putFileInPrivateStorage($file , $this->courseTestQuestionPath);
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
        $question = CourseTestQuestion::findorfail($id);
        return view('instructor.course_test_questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = CourseTestQuestion::findorfail($id);
        return view('instructor.course_test_questions.edit', compact('question'));
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
        $test = CourseTestQuestion::findorfail($id);

        $data = $this->validateData($request , $id);
        if($data == false){
            return redirect()->back()->with('error_msg', 'We couldn`t validate data!');
        }

        $data['course_id'] = $test->course_id;
        $test->update($data);
        return redirect()->route('course.test.details.show' , $test->course_id)->with('success_msg', 'Course test question updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question =CourseTestQuestion::findorfail($id);
        $question->delete();
        return redirect()->back()->with('success_msg', 'Course test question deleted successfully!');
    }
}
