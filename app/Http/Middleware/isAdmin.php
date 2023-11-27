<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if(auth()->user()->role_id==0)
            {
                return $next($request);
            }
            else {
                return redirect('dashboard')->with('error', 'You do not have admin access');
            }
        }
        else {
            return redirect('/')->with('fail', 'You have to login first');
        }
     
        
    }
}
