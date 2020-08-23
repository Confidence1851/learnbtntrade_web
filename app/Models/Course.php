<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Constants;
    protected $guarded = [];

    public function getImageAttribute($image){
        return $this->coursePreviewImagePath.'/'.$image;
    }

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function category(){
        return $this->belongsTo(CourseCategory::class , 'course_category_id');
    }

    public function author(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function sections(){
        return $this->hasMany(CourseSection::class);
    }

    public function likes(){
        return $this->hasMany(CourseLike::class);
    }

    public function tests(){
        return $this->hasMany(CourseTest::class);
    }

    public function countReviews(){
        return 0;
    }

    public function countStuddentsEnrolled(){
        return 0;
    }

    public function getPrice(){
        $price = $this->price - $this->discount;
        if($price < 1){
            return 'Free';
        }
        return format_money($this->price);
    }


    public function payableAmount(){
       return  $this->price - $this->discount;
    }

    public function getDuration(){
        return $this->sections()->where('status' , $this->activeStatus)->sum('duration');
    }
}
