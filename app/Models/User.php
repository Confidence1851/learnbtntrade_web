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
        $role =$this->role;
        $sub_role =$this->sub_role;
        if($role == 0 && $sub_role == 0){
                return 'User';
        }
        if($role == 0 && $sub_role == 1){
            return 'Agent';
        }
        if($role == 1 && $sub_role == 1){
            return 'Sub Administrator';
        }
        if($role == 2 && $sub_role == 1){
            return 'Administrator';
        }
    }

    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'ref_code', 'role', 'location', 'phone' ,
        'country' , 'state', 'gender'  , 'avatar'
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
            // $avatar = new Avatar();
            return getFileFromStorage('user.jpg');
        }
        return getFileFromStorage($this->avatar);
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

}
