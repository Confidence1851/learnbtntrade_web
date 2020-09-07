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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getAnswerFile(){
        return route('read_file' , encrypt($this->courseTestAnswerPath.'/'.$this->file));
    }
}
