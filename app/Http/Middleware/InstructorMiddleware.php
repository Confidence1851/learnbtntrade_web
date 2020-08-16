<?php

namespace App\Http\Middleware;

use App\Traits\Constants;
use Closure;

class InstructorMiddleware
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
        if(auth('web')->check()){
            $user = auth('web')->user();
            if($user->role == $this->instructorRole){
                return $next($request);
            }
            return redirect()->back()->with('error_msg','Acess Denied!...Instructors only!');
        }
        else{
            return redirect('/login');
        }
        return redirect('/');
    }
}
