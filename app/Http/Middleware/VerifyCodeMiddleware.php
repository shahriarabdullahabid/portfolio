<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyCodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the session has a 'verified_code' key
        if (!$request->session()->has('verified_code')) {
            return redirect()->route('login.form')->withErrors(['access' => 'Unauthorized access. Please verify with email first.']);
        }

        return $next($request);
    }
}
