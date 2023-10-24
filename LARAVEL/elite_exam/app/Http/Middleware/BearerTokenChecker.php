<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class BearerTokenChecker
{
    public function handle($request, Closure $next)
    {
        if (!$request->headers->has('Bearer-Token')) {
            return response()->json(['error' => 'Bearer Token Header is missing'], 400);
        }

        if ($request->header('Bearer-Token') !== config('app.bearer_token')) {
            return response()->json(['error' => 'Bearer Token Header is invalid!'], 400);
        }

        return $next($request);
    }
}

?>