<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$role)
    {
    //    dd('ok');
        // Check if the user has the specified role
        if ($request->user() && $request->user()->role == $role) {
            return $next($request);
        }

        // Redirect or return an error response if the user doesn't have the role
        return abort(403, 'Unauthorized');
    }
}
