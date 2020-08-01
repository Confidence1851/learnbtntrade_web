<?php

namespace App\Http\Middleware;

use App\Models\Agent;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AgentMiddleware
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
            $agent = Agent::where('user_id',$user->id)->first();
            if(!empty($agent)){
                return $next($request);
            }
            // dd('here');
            // Session::flash('error_msg','Acess Denied!...Admins only!');
            return redirect('/home')->with('error_msg','Acess Denied!...Agents only!');
        }
        else{
            return redirect('/login');
        }
        return redirect('/');
    }
}
