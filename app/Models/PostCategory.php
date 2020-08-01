<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function posts(){
        return $this->hasmany(Post::class);
    }

    public function trimTitle($limit){
        return  ucfirst(str_limit($this->title, $limit = $limit, $end = '...')) ;
    }
}
