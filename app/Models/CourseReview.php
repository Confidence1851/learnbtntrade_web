<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    use Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function course(){
        return $this->belongsTo(Course::class , 'course_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

}
