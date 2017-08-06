<?php

namespace Infrastructure\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Jwt
{
    public function handle($request, Closure $next)
    {
        $headers = $request->headers->all();
        if (isset($headers['authorization'])) {
            # code...
            $jwt = substr($headers['authorization'][0], env('TOKEN_PREFIX_SIZE'));
            $response = Redis::get($jwt);

            if (is_null($response)) {
                throw new HttpException(403, "Jwt error");   
            }
            return $next($request);
        }
    }
}