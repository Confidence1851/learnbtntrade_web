<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class CourseTestQuestion extends Model
{
    use Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function course(){
        return $this->belongsTo(Course::class , 'course_id');
    }

    public function test(){
        return $this->belongsTo(CourseTest::class , 'course_test_id');
    }

    public function getType($num = null){
        switch($num ?? $this->type){
            case 0:
                return 'Single Choice';
            case 1:
                return 'Multi Choice';
            case 2:
                return 'Generic';
            default:
                return null;
        }
    }
}
