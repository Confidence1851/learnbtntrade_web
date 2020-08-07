<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use Constants;
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

}
