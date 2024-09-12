<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            // If the user is admin, allow access to the next request (admin dashboard)
            return $next($request);
        }

        // If not admin, redirect to the user dashboard or any other route
        return redirect('dashboard');
    }
}
