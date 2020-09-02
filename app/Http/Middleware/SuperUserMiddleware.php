<?php

namespace App\Http\Middleware;

use App\Traits\Constants;
use Closure;

class SuperUserMiddleware
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
            if(in_array($user->role, [ $this->bloggerRole , $this->instructorRole , $this->adminRole ])){
                return $next($request);
            }
            return redirect()->back()->with('error_msg','Acess Denied!... Super Users only!');
        }
        else{
            return redirect('/login');
        }
        return redirect('/');
    }
}
