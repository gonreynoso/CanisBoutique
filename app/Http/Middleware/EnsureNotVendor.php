<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureNotVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Usamos strtolower para evitar errores de mayúsculas/minúsculas
        if ($request->user() && $request->user()->role && strtoupper($request->user()->role->name) === 'VENDEDOR') {
            return redirect()->route('admin.index')
                ->with('message', 'Acceso denegado a esta sección.')
                ->with('icono', 'error');
        }

        return $next($request);
    }
}
