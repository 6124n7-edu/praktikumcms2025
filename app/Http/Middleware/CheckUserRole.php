<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user terautentikasi
        if (!Auth::check()) {
            // Redirect login page atau return unauthorized response
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        $user = Auth::user();

        // Cek jika role user ada dalam array roles
        if (!in_array($user->role, $roles)) {
            // If the user does not have the required role, redirect or abort
            // Opsi 1: Redirect dengan error message
            return redirect('/')->with('error', 'You do not have the required role to access this resource.');

            // Opsi 2: Abort dengan 403 Forbidden status
            // abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
