<?php

namespace App\Http\Controllers;

use App\Traits\Constants;
use App\Traits\Methods;
use App\Traits\ModelIndex;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\Notifications;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests , ModelIndex, Methods , Notifications , Constants;
}
