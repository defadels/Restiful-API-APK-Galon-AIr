<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotDepot
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
        if(!Auth::user()->jenis == 'depot') {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
