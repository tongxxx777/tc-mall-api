<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutoDiffGuard
{
    public function handle(Request $request, Closure $next, string $guard)
    {
        if (!empty($guard)) {
            config(['auth.defaults.guard' => $guard]);
        }
        return $next($request);
    }
}
