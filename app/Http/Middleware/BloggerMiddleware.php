<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Traits\Constants;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BloggerMiddleware
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
            if($user->role == $this->bloggerRole){
                return $next($request);
            }
            return redirect()->back()->with('error_msg','Acess Denied!...Bloggers only!');
        }
        else{
            return redirect('/login');
        }
        return redirect('/');
    }
}
