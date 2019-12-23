<?php

namespace App\Http\Middleware;

use Closure;

class ProxyAuth
{

    public function handle($request, Closure $next)
    {
        if(!session()->has('token')) {
            session()->flush();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
