<?php

namespace App\Http\Middleware;

use Closure;

class AuthoriseMiddleware404
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

        if(session('user')){

            return $next($request);

        }
        return abort(404);
    }
}
