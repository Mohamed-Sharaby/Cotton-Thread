<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth('admin')->check()  || auth('admin')->user()->is_ban == 1) {
            session()->flush();
            return redirect('/');
        }
        return $next($request);
    }
}
