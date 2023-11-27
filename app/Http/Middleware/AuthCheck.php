<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session; 
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            return redirect('/')->with('fail', 'You have to login first');

        }
        
        return $next($request);
    }
}
