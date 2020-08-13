<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Repository constructor
     *
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Get's logged in user
     *
     * @return User
     */
    public function user()
    {
        return auth('web')->user();
    }


    public function generate_account_no(){
        $number = rand(1000000000,9999999999);
        $check = $this->model->where('account_no',$number)->count();
        if($check == 0){
            return $number;
        }
        return $this->generate_account_no();
    }



}
