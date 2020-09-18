<?php

namespace App\Http\Controllers\Student;

use App\CourseReview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseReviewsController extends Controller
{

    public function store(Request $request){
        $validator= Validator::make($request->all() , [
            'course_id' => 'required',
            'stars' => 'required',
            'comment' => 'required',
        ]);

        if($validator->fails()){

        }

        $data = $validator->validated();
        $data['user_id'] = auth()->id();

        CourseReview::create($data);
        return back();
    }
}
