<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

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
        if(Auth::check() && (Auth::user()->GroupID)===1)
        {
            return $next($request);
        }
        else
        {
            return view('errors.503')->withErrors('You are not logged in');
        }
    }
}
