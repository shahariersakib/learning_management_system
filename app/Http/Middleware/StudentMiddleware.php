<?php

namespace App\Http\Middleware;

use Closure;

class StudentMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role_id == 3) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
