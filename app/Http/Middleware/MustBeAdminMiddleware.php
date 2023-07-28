<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user has a role different from 0 (or any other role you want to restrict)
        if (auth()->check() && auth()->user()->role == User::ADMIN) {
            return $next($request);
        }

        // Redirect users with role 0 (or any other restricted role) to a different route
        return redirect(RouteServiceProvider::HOME)->with('error', 'You do not have permission to access this page.');
    }
}
