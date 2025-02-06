<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (!$request->session()->has('authenticated')) {
            return redirect()->route('login.form')->withErrors(['access' => 'You are not logged in.Login to continue']);
        }

        return $next($request); // Allow access for authenticated users
}
}