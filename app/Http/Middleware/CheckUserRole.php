<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {

                return redirect()->route('dashboard');
            } elseif (Auth::user()->role_id == 2 && Auth::user()->status == 'Unpaid') 
            {
                return redirect()->route('payments');
            } else {
                // dd("not ok");
            }
        }
        return $next($request);
    }
    

}
