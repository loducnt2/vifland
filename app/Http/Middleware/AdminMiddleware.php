<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // admin
    public function handle($request, Closure $next)
    {
        // nếu user type = 0, tức là user role thì sẽ bay về route login
        if (Auth::user()->user_type=="0") {
            return redirect('/login');
        }
        return $next($request);
    }
}
