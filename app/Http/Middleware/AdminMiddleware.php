<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
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
            if($user->role == 5 && $user->status == 1){
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
