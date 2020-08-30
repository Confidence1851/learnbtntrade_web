<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class PlanSubscription extends Model
{
    use Constants;
    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function plan(){
        return $this->belongsTo(Plan::class , 'plan_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function orderItem(){
        return $this->belongsTo(OrderItem::class , 'order_item_id');
    }
}
