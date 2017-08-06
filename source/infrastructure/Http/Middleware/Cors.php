<?php

namespace Infrastructure\Http\Middleware;

use Closure;

class Cors 
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Authorization, Content-Type, X-Auth-Token, Origin')
            ->header('Access-Control-Expose-Headers', 'x-quantity');
    }
}
