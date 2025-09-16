<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Pastikan user memiliki role admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Admin access required.');
        }

        return $next($request);
    }
}