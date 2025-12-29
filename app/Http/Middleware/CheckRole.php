<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, $role)
        {
            if (!Auth::check()) {
                abort(403, 'Unauthorized action.');
            }

            if (Auth::user()->role->name !== $role) {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        }
}
