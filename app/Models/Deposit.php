<?php

namespace App\Models;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Deposit extends Model
{
    use LogsActivity , Constants;
    protected static $logUnguarded = true;

    protected $guarded = [];

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
