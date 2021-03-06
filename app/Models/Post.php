<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Constants , SoftDeletes;
    protected $guarded = [];
    public $bodyFileStore = "/blog/post/";

    
    public function getPostBodyFileName($id){
        return $this->bodyFileStore.$id.".txt";
    }

    public function setBodyAttribute($value)
    {
        $filename = $this->body;
        if(empty($filename) ||  !Storage::disk('local')->exists($filename)){
            $id = uniqid();
            $filename = $this->getPostBodyFileName($id);
        }
        
        Storage::disk('local')->put($filename, $value);
        $this->attributes['body'] = $filename;
    }

    public function getBodyAttribute($value)
    {
        
        $filename = $value;
        if(Storage::disk('local')->exists($filename)){
            $content = Storage::disk('local')->get($filename);
        }
        else{
            $content = $value;
        }

        return $this->attributes['body'] =  $content;

    }

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
