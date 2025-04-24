<?php

namespace App\Http\Middleware;

use Closure;

class PreventRequestsDuringMaintenance
{
    public function handle($request, Closure $next)
    {
        // Add your logic here
        return $next($request);
    }
}