<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Redirect;

class AdminOnly
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
        if (!Auth::check() || !Auth::user()->admin) {
			return Redirect::to('login')->with("bad", "You must be an administrator to view that page.");;
        }

        return $next($request);
    }
}
