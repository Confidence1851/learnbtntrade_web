<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class CourseTestAnswer extends Model
{
    use Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function question(){
        return $this->belongsTo(CourseTestQuestion::class , 'course_test_question_id');
    }
}
