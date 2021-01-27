<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkBannedUser
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
        if (auth()->check() && auth()->user()->is_ban == 1){
            auth()->logout();
            return redirect(route('login'))->with('error','لقد تم حظر الحساب الخاص بك من قبل الادارة');
        }
        return $next($request);
    }
}
