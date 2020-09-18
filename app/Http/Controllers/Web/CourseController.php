<?php

namespace App\Http\Controllers\Web;

use App\Models\CourseReview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function courses(Request $request){
        $search_keywords = $request->keywords;
        $category_id = $request->category_id;
        $categories = $this->CourseCategory->model()->where('status' , $this->activeStatus)->get();
        if(empty($category_id)){
            $courses = $this->Course->model()->where('status' , $this->activeStatus)
            ->where('title', 'like' , '%'.$search_keywords.'%')->paginate(20);
        }
        else{
            $courses = $this->Course->model()->where('status' , $this->activeStatus)
            ->where('title', 'like' , '%'.$search_keywords.'%')
            ->where('course_category_id' , $category_id )->paginate(20);
            $category_id = $this->CourseCategory->find($category_id);
        }
        $featured_courses = $this->Course->model()->where('status' , $this->activeStatus)->where('featured' , $this->activeStatus)->limit(10)->get();

        return view('web.courses' , compact('courses' , 'featured_courses' , 'categories' , 'search_keywords' , 'category_id'));
    }

    public function category_courses(Request $request , $id){
        $category = $this->CourseCategory->find($id);
        if(!empty($category)){
            $request['category_id'] = $id;
            return $this->courses($request);
        }
        return redirect()->back();
    }

    public function course_info($id , $slug){
        $categories = $this->CourseCategory->model()->where('status' , $this->activeStatus)->get();
        $course = $this->Course->find($id);
        $related_courses = $this->Post->model()->where('status' , $this->activeStatus)->where('post_category_id' , $course->category->id )->limit(10)->get();
        return view('web.course_info' , compact('course' , 'categories' , 'related_courses'));
    }


    public function review_course(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'course_id' => 'required|string',
            'stars' => 'required|string',
            'comment' => 'required|string',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['status'] = $this->activeStatus;
        $review = CourseReview::create($data);
        return response()->json([
            'success' => true,
            'msg' => 'Review submitted successfully!',
            'data' => getCourseRatingStats($data['course_id']),
            'review' => [
                'avatar' => $review->user->getAvatar(),
                'name' => $review->user->fullName(),
                'date' => date('jS F Y', strtotime($review->created_at)),
                'comment' => $review->comment,
                'stars' => $review->stars,
            ],
        ]);
    }



}
