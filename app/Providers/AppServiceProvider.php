<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL; // <--- 1. ASEGURATE DE IMPORTAR ESTO
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 2. AGREGAR ESTE BLOQUE
        // Si la petición viene con el header de Cloudflare indicando HTTPS, forzamos el esquema.
        Paginator::useBootstrapFive();
        if (request()->server('HTTP_X_FORWARDED_PROTO') === 'https') {
            URL::forceScheme('https');
        }
    }
}