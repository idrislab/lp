<?php

namespace LandingPages\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Auth::check() && auth()->user()->hasRole($role)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
