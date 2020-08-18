<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Constants;
use Laravolt\Avatar\Avatar;

class User extends Authenticatable  //implements MustVerifyEmail
{
    use Notifiable , Constants;

    protected static $logFillable  = true;

    // public function sendApiEmailVerificationNotification()
    // {
    //     $this->notify(new VerifyApiEmail); // my notification
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function getRole(){
        $role = $this->role;
        if($role == $this->userRole){
                return 'User';
        }
        if($role ==  $this->bloggerRole){
            return 'Blogger';
        }
        if($role ==  $this->instructorRole){
            return 'Instructor';
        }
        if($role ==  $this->subAdminRole){
            return 'Sub Administrator';
        }
        if($role == 5){
            return 'Administrator';
        }
    }

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'ref_code', 'role', 'location', 'phone' ,
        'country' , 'state', 'gender'  , 'avatar' , 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fullName(){
        return $this->fname.' '.$this->lname;
    }

    public function getAvatar(){
        if(empty($this->avatar)){
            return getFileFromStorage('user.png');
        }
        return route('user.avatar',encrypt($this->userImagePath.'/'.$this->avatar));
    }

    public function agent(){
        return $this->hasOne(Agent::class);
    }

    public function referred(){
        return $this->hasOne(Referral::class);
    }

    public function bank(){
        return $this->hasOne(BankAccount::class);
    }

    public function account(){
        return $this->hasOne(Account::class);
    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }


    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function activeOrders(){
        return $this->hasMany(Order::class)->where('status', $this->activeStatus);
    }

}
