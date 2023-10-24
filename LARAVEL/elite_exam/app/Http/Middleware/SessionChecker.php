<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class SessionChecker
{
    public function handle($request, Closure $next)
    {
        $sCurrentPath = $request->getPathInfo();
        if ($sCurrentPath === '/dashboard') {
            if (session()->has('user_name') === false) {
                return redirect('/login'); // Redirect to the login page
            }
        } else {
            if (session()->has('user_name') === true) {
                return redirect('/dashboard'); // Redirect to the login page
            }
        }
        return $next($request);
     
    }
}

?>