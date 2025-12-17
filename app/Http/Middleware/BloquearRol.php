<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BloquearRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $rolBloqueado, string $mensaje = 'Acceso denegado'): Response
    {
        // Si el usuario tiene el rol que queremos bloquear, lo sacamos.
        if ($request->user() && $request->user()->hasRole($rolBloqueado)) {
            return redirect()->route('admin.index')
                ->with('message', $mensaje)
                ->with('icono', 'error');
        }

        return $next($request);
    }
}