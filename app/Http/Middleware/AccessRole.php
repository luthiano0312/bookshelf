<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$allowedRoles): Response
    {
        if (!auth()->check()) {
            abort(403, 'Usuário não autenticado.');
        }

        $userRole = auth()->user()->role;

        if (!in_array($userRole, $allowedRoles)) {
            abort(403, "Você não tem permissão para acessar esta área.");
        }
        return $next($request);
    }
}
