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
        if(Auth::check()){
            $user = Auth::User();
            // dd($user);
            if($user->role == 2 && $user->status == 1){
                return $next($request);
            }
            // dd('here');
            // Session::flash('error_msg','Acess Denied!...Admins only!');
            return redirect('/home')->with('error_msg','Acess Denied!...Admins only!');
        }
        else{
            return redirect('/login');
        }
        return redirect('/');
    }
}
