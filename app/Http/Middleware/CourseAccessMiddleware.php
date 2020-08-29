<?php

namespace App\Http\Middleware;

use App\Traits\Constants;
use Closure;

class CourseAccessMiddleware
{
    use Constants;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        dd($request);
        if(auth('web')->check()){
            $user = auth('web')->user();
            if(!in_array($user->role , [$this->adminRole , $this->instructorRole])){
                // $check
                return $next($request);
            }
            return redirect()->route('homepage')->with('error_msg','Acess Denied!...Admins only!');
        }
        else{
            return redirect('/login');
        }
        return redirect('/');
    }
}
