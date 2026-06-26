<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        $normalizedRoles = ['seller' => 'vendor', 'vendor' => 'vendor', 'admin' => 'admin', 'customer' => 'customer'];
        $normalizedUserRole = $normalizedRoles[$userRole] ?? $userRole;

        if (! in_array($normalizedUserRole, $roles, true)) {
            abort(403, 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
