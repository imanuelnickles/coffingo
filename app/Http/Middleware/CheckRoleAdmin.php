<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoleAdmin
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
        if(Auth::check())
        {
       
        if(Auth::user()->role != 1){
            //Not Admin Redirect to User 
            return redirect('/');
        }
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
