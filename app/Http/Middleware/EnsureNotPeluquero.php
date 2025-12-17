<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureNotPeluquero
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ?string $section = null): Response
    {
        if ($request->user()->role?->name === 'PELUQUERO') {
            $message = 'Acceso denegado a ' . ($section ?? 'esta sección') . '.';

            return redirect()->route('admin.index')
                ->with('message', $message)
                ->with('icono', 'error');
        }

        return $next($request);
    }
}
