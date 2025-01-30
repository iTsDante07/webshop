<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if user is logged in and is an admin
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            // Return a 403 Forbidden response if not authorized
            abort(403, 'Ongeautoriseerde toegang');
        }

        // Allow request to proceed
        return $next($request);
    }
}
