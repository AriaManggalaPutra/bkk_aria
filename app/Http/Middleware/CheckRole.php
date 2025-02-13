<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (Auth::check()) {
            if (strtolower(Auth::user()->roles) === strtolower($role)) {
                return $next($request);
            } else {
                return redirect('/error')->withErrors(['error' => 'Access Denied']);
            }
        } else {
            return redirect('/login')->withErrors(['error' => 'Please log in']);
        }
    }
    
}
