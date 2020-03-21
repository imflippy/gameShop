<?php

namespace App\Http\Middleware;

use Closure;

class LogginMiddleware
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
        if(session()->has('user')){
            \Log::channel('daily')->info('User: '. session('user')->username .', From ip: '. \Request::ip() . ', On route: '. \Request::url());
        } else {
            \Log::channel('daily')->info('User: Not autorized, From ip: '. \Request::ip() . ' On route: '. \Request::url());
        }
        return $next($request);
    }
}
