<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

    use Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function getAvatar(){
        if(empty($this->image)){
            return getFileFromStorage('user.png');
        }
        return route('read_file',encrypt($this->testimonialImagePath.'/'.$this->image));
    }

}
