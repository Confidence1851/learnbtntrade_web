<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseTest;
use App\Models\CourseTestAnswer;
use App\Models\CourseTestQuestion;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function take_course($id , $slug){
        $section = $this->CourseSection->find(decrypt($id));
        $course = $this->CourseSection->find($section->course_id);
        $sections = $this->CourseSection->model()
                    ->where('course_id', $course->id)
                    ->where('status' , $this->activeStatus)
                    ->orderby('number', 'asc')->get();
        return view('student.course_sections' , compact('course' , 'section' , 'sections'));
    }

    public function download_resource($id){
        $user = $this->User->model();
        if(true){
            $resource = $this->CourseSectionResource->find(decrypt($id));
            return downloadFileFromPrivateStorage($resource->file , $resource->filename);
        }
        else{
            return response()->json([
                'success' => false,
                'msg' => 'You don`t have access to this resource',
                'data' => null
            ]);
        }
    }

    public function my_courses(){
        $user = $this->User->user();
        $orderedCourses = userOrderedCourses($user->id);
        $courses = $this->Course->model()->whereIn('id', $orderedCourses)->paginate(50);

        return view('student.courses', compact('courses'));
    }


    public function section_video($id){
        $user = $this->User->user();
        if(true){
            $section = $this->CourseSection->find(decrypt($id));
            return getFileFromPrivateStorage($section->video);
        }
        else{
            return response()->json([
                'success' => false,
                'msg' => 'You don`t have access to this resource',
                'data' => null
            ]);
        }
    }

    public function go_to_course($id){
        $course = $this->Course->find($id);
        $section = $this->CourseSection->model()->where('course_id' , $course->id)->first();
        return redirect()->route('my_courses.take_course' , [ 'id' => encrypt($section->id) , 'slug' => $section->slug ]);
    }

    public function take_tests($id){
        $course = $this->Course->find($id);
        $tests = CourseTest::where('course_id' , $course->id)->where('status' , $this->activeStatus)->get();
        return view('student.course_tests', compact('tests' , 'course'));
    }


    public function start_test($id){
        $test = CourseTest::find($id);
        $questions = CourseTestQuestion::where('course_test_id' , $test->id)->where('status' , $this->activeStatus)->get();
        return view('student.test_questions', compact('questions' , 'test'));
    }

    public function submit_tests(Request $request){
        $data = $request->validate([
            'test_id' => 'required|string',
            'answer' => 'required',
        ]);

        $test = CourseTest::find($request->test_id);
        if(empty($test)){

        }

        foreach($test->questions as $question){

            $text = $request->answer['text_'.$question->id];
            $file = $request->answer['file_'.$question->id];
            if(!empty($file)){
                $file = putFileInPrivateStorage($file , $this->courseTestAnswerPath);
            }
            $itemData = [
                'user_id' => auth()->id(),
                'course_test_question_id' => $question->id,
                'answer' => '',
                'user_answer' => $text ?? '',
                'file' => $file,
                'status' => $this->activeStatus,
            ];
            CourseTestAnswer::create($itemData);
        }

        $course =$test->course;
        $message = 'You have successfully submitted your answers for "'.$test->title.'". Please wait while the instructor review`s your test!';
        return view('student.test_complete', compact('course' , 'message'));
    }

    // public function test_complete($id){
    //     $course = $this->Course->find($id);
    //     $message = 'You have successfully submitted your answers for '.$test->title.'.';
    //     return view('student.test_complete', compact('course'));
    // }

}
