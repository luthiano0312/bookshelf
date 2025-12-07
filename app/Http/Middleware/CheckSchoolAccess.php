<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSchoolAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user->role == 1) {
            return $next($request);
        }

        $schoolIdFromRoute = $request->route('school')
                          ?? $request->route('user')
                          ?? $request->route('book')
                          ?? $request->route('categories')
                          ?? $request->route('loans')
                          ?? $request->school_id
                          ?? null;

        if (!$schoolIdFromRoute) {
            return $next($request);
        }

        if (is_object($schoolIdFromRoute)) {
            $schoolIdFromRoute = $schoolIdFromRoute->school_id ?? $schoolIdFromRoute->id;
        }

        if ($user->school_id != $schoolIdFromRoute) {
            abort(403, 'Você não tem permissão para acessar dados de outra escola.');
        }

        return $next($request);
    }
}
