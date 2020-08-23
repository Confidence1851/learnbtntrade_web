<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class CourseTest extends Model
{
    use Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function author(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function course(){
        return $this->belongsTo(Course::class , 'course_id');
    }

    public function questions(){
        return $this->hasMany(CourseTestQuestion::class , 'course_test_id');
    }

    public function getDifficulty($num = null){
        switch($num ?? $this->difficulty){
            case 0:
                return 'Beginner';
            case 1:
                return 'Intermediate';
            case 2:
                return 'Advanced';
            case 3:
                return 'Professional';
            default:
                return null;
        }
    }
}
