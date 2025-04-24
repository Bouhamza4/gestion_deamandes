<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // // dd('handle');
        // return $next($request);
        $name = $request->route('name');
    if($name == "admin"){
      return $next($request);
    }
    else{
      return response()->json(["error"=>"You are not admin"],401);
    }
    }
}
