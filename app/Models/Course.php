<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use Constants , SoftDeletes;

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

    public function activeTests(){
        return $this->hasMany(CourseTest::class)->where('status' , $this->activeStatus);
    }

    public function countReviews(){
        return 0;
    }

    public function orderedItems(){
        return $this->hasMany(OrderItem::class , 'course_id');
    }

    public function orderedCount(){
        return $this->hasMany(OrderItem::class , 'course_id')->count();
    }

    public function getPrice(){
        $price = ($this->price - $this->discount);
        if($price < 1){
            return 'Free';
        }
        return format_money($price);
    }


    public function payableAmount(){
       return  $this->price - $this->discount;
    }

    public function getDuration(){
        return $this->sections()->where('status' , $this->activeStatus)->sum('duration');
    }

    public function activeReviews(){
        return $this->hasMany(CourseReview::class)->where('status' , $this->activeStatus);
    }
}
