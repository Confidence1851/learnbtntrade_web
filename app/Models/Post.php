<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Constants , SoftDeletes;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function category(){
        return $this->belongsTo(PostCategory::class , 'post_category_id');
    }

    public function author(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function comments(){
        return $this->hasMany(PostComment::class);
    }

    public function likes(){
        return $this->hasMany(PostLike::class);
    }

    public function getImageAttribute($image){
        return $this->blogPostsImagePath.'/'.$image;
    }
}
