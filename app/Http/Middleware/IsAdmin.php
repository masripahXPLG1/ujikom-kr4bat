<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Belum login → suruh login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Bukan admin → lempar ke dashboard user
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('user.dashboard');
        }

        // Admin → lanjutkan
        return $next($request);
    }
}