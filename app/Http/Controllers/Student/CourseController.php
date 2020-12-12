<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseTest;
use App\Models\CourseTestAnswer;
use App\Models\CourseTestQuestion;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\VideoStream;
use Carbon\Carbon;

class CourseController extends Controller
{

    public function take_course($id , $slug){
        $section = $this->CourseSection->find($id);

        $check = $this->validateAccess($section->course_id);
        if(!$check){
            return view('student.access_denied');
        }

        $course = $this->Course->find($section->course_id);
        $sections = $this->CourseSection->model()
                    ->where('course_id', $course->id)
                    ->where('status' , $this->activeStatus)
                    ->orderby('number', 'asc')->get();
        return view('student.course_sections' , compact('course' , 'section' , 'sections'));
    }

    public function download_resource($id)
    {
        $resource = $this->CourseSectionResource->find($id);
        $check = $this->validateAccess($resource->section->course_id);
        if(!$check){
            return view('student.access_denied');
        }
        return downloadFileFromPrivateStorage($resource->file , $resource->filename);
    }

    public function my_courses(){
        $user = $this->User->user();
        $orderedCourses = userOrderedCourses($user->id);
        $courses = $this->Course->model()->whereIn('id', $orderedCourses)->paginate(50);
        return view('student.courses', compact('courses'));
    }



    public function section_video($id){
        $key = 'section_load_video';
        if(!session()->has($key)){
            return response()->json([
                'success' => false,
                'msg' => 'Could not load  this resource',
                'data' => null
            ]);
        }
        $hash = decrypt(session()->get($key));
        // $validate = Carbon::parse($hash['hash'])->diffInSeconds(now() , false);
        // if($validate > 10){
        //     return response()->json([
        //         'success' => false,
        //         'msg' => 'Your access to this resource timed out!',
        //         'data' => null
        //     ]);
        // }

        $section = $this->CourseSection->find($hash['key']);
        // dump($section->id);
        $check = $this->validateAccess($section->course_id);
        if(!$check){
            return response()->json([
                'success' => false,
                'msg' => 'You don`t have access to this resource',
                'data' => null
            ]);
        }
        // dd($check);

        //  return getFileFromPrivateStorage($section->video);
        $stream = new VideoStream($section->video);
        // session()->forget($key);
        $stream->start();
    }

    public function section_load_video($id){
        $section = $this->CourseSection->find($id);
        $check = $this->validateAccess($section->course_id);
        if(!$check){
            return response()->json([
                'success' => false,
                'msg' => 'You don`t have access to this resource',
                'data' => null
            ]);
        }

        $hash = encrypt(['key' => $section->id, 'hash' => now()]);
        session()->put('section_load_video' , $hash);

        return response()->json([
            'success' => true,
            'msg' => 'Video resource loaded!',
            'data' => [
                'title' => $section->title,
                'url' => route('my_courses.section_video' , $section->id),
            ]
        ]);
    }

    public function validateAccess($course_id){
        $user = auth('web')->user();
        if(in_array($user->role , [$this->adminRole , $this->instructorRole] )){
            return true;
        }
        $my_courses = userOrderedCourses($user->id);
        if(!in_array($course_id , $my_courses->toArray())){
            return false;
        }
        return true;
    }

    public function go_to_course($id){
        $course = $this->Course->find($id);
        dd();
        $check = $this->validateAccess($id);
        if(!$check){
            return view('student.access_denied');
        }
        $section = $this->CourseSection->model()->where('course_id' , $course->id)->first();
        return redirect()->route('my_courses.take_course' , [ 'id' => $section->id , 'slug' => $section->slug ]);
    }

    public function take_tests($id){
        $course = $this->Course->find($id);

        $check = $this->validateAccess($id);
        if(!$check){
            return view('student.access_denied');
        }

        $tests = CourseTest::where('course_id' , $course->id)->where('status' , $this->activeStatus)->get();
        return view('student.course_tests', compact('tests' , 'course'));
    }


    public function start_test($id){
        $test = CourseTest::find($id);

        $check = $this->validateAccess($test->course_id);
        if(!$check){
            return view('student.access_denied');
        }

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
            $file = null;
            if(array_key_exists('file_'.$question->id , $request->answer )){
                $file = $request->answer['file_'.$question->id];
                if(!empty($file)){
                    $file = putFileInPrivateStorage($file , $this->courseTestAnswerPath);
                }
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
