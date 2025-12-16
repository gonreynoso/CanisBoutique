<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // A. TUS ALIAS DE SPATIE (Esto lo dejamos tal cual)
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);

        // B. LÓGICA DE REDIRECCIÓN INTELIGENTE (Esto es lo nuevo)
        $middleware->redirectTo(
            guests: '/login', // Si no están logueados, van al login
            users: function (Request $request) {
            // Si ya están logueados e intentan entrar al login...
    
            // Si tienen permiso de admin, van al Dashboard
            if ($request->user()?->can('ver_panel_admin')) {
                return route('admin.index');
            }

            // Si son clientes, van al inicio
            return route('welcome');
        }
        );

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
