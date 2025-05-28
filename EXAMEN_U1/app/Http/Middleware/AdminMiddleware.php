<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect()->route('computadores.index')
                ->with('error', 'No tienes permisos para realizar esta acción.');
        }

        return $next($request);
    }
}