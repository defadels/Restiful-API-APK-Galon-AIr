<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfNotEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {   
        if(!(Auth::user()->jenis == 'admin' || Auth::user()->jenis == 'editor'))
        {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
