<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSection extends Model
{
    use Constants , SoftDeletes;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function course(){
        return $this->belongsTo(Course::class , 'course_id');
    }

    public function resources(){
        return $this->hasMany(CourseSectionResource::class);
    }

    public function activeResources(){
        return $this->hasMany(CourseSectionResource::class, 'course_section_id')->where('status', $this->activeStatus);
    }

    public function getVideoAttribute($video){
        return $this->courseSectionVideoPath.'/'.$video;
    }

}
