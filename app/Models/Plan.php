<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use Constants , SoftDeletes;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function items(){
        return $this->hasMany(PlanItem::class);
    }

    public function activeItems(){
        return $this->hasMany(PlanItem::class)->where('status' , $this->activeStatus);
    }
}
