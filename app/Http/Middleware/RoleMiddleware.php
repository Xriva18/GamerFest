<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        $roles = [
            'admin' => 1,
            'coordinador' => 2,
            'tesorero' => 3,
            'participante' => 4,
        ];

        if (!isset($roles[$role]) || $user->rol_id !== $roles[$role]) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
