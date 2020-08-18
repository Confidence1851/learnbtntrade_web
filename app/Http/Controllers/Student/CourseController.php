<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function take_course($id , $slug){
        $section = $this->CourseSection->find(decrypt($id));
        $course = $this->CourseSection->find($section->course_id);
        $sections = $this->CourseSection->model()
                    ->where('course_id', $course->id)
                    ->where('status' , $this->activeStatus)
                    ->orderby('number', 'asc')->get();
        return view('web.course_sections' , compact('course' , 'section' , 'sections'));
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
        $courses = collect();
        foreach($user->activeOrders()->pluck('id') as $order){
            dump($order);
        // $orderedCourses = OrderItem::where('course_id' , '<>' , null)->wherehas('course')->

        }
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

}
