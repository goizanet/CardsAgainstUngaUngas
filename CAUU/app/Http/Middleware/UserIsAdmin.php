<?php

namespace App\Http\Middleware;

use Closure;

class UserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->rol->nombre != 'admin') {
            return response()->json([
                'message' => 'No tienes permisos'
            ], 403);
        }

        return $next($request);
    }
}
