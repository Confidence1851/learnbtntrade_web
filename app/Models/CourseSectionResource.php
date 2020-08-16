<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class CourseSectionResource extends Model
{
    use Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function section(){
        return $this->belongsTo(CourseSection::class , 'course_section_id');
    }

    public function getFileAttribute($file){
        if($this->type == 'Document'){
            return $this->courseSectionResourceDocPath.'/'.$file;
        }
        if($this->type == 'Image'){
            return $this->courseSectionResourceImagePath.'/'.$file;
        }
        if($this->type == 'Video'){
            return $this->courseSectionResourceVideoPath.'/'.$file;
        }
    }

}
