<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\AjusteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\AdminTurnoController;
use App\Http\Controllers\AdminController; // <--- AGREGADO: Importante para el Dashboard

/*
|--------------------------------------------------------------------------
| 1. RUTAS PÚBLICAS (Accesibles para todo el mundo)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('web.index');
})->name('web.index');

// Rutas de Reserva (Cliente Público)
Route::get('/reservar', [TurnoController::class, 'create'])->name('web.reservar');
Route::post('/reservar', [TurnoController::class, 'store'])->name('web.reservar.store');
Route::get('/reserva-confirmada', function () {
    return view('web.reservaConfirmada');
})->name('web.reservaConfirmada');

// Tienda Pública
Route::get('/tienda', [StoreController::class, 'index'])->name('tienda.index');
Route::get('/tienda/producto/{id}', [StoreController::class, 'show'])->name('tienda.show');
Route::get('/carrito', [StoreController::class, 'cart'])->name('tienda.cart');

// Contacto
Route::get('/contacto', function () {
    return view('web.contact');
})->name('web.contacto');

// Login Social (Google)
Route::middleware('guest')->group(function () {
    Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);
});


/*
|--------------------------------------------------------------------------
| 2. RUTAS DE CLIENTE (Requieren Login, pero NO son Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Checkout y Perfil
    Route::get('/checkout', [StoreController::class, 'checkout'])->name('tienda.checkout');
    Route::get('/mi-cuenta', [UserController::class, 'profile'])->name('usuarios.perfil');

    // Rutas estándar de Breeze (Perfil de usuario)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| 3. PANEL ADMINISTRATIVO (BLINDADO)
|--------------------------------------------------------------------------
| Aquí aplicamos el middleware 'can:ver_panel_admin'.
| Si eres CLIENTE, Laravel te dará error 403 Forbidden.
*/

Route::middleware(['auth', 'verified', 'can:ver_panel_admin'])
    ->prefix('admin')       // Agrega '/admin' a la URL automáticamente
    ->name('admin.')        // Agrega 'admin.' a los nombres de ruta
    ->group(function () {

        // A. DASHBOARD (Usa el Controlador con estadísticas que creamos)
        Route::get('/', [AdminController::class, 'index'])->name('index');

        // B. TURNOS (Calendario Admin)
        Route::get('/turnos', [AdminTurnoController::class, 'index'])->name('turnos.index');
        Route::get('/turnos/datos', [AdminTurnoController::class, 'datos'])->name('turnos.datos');
        Route::delete('/turnos/{id}', [AdminTurnoController::class, 'destroy'])->name('turnos.destroy');

        // C. USUARIOS (Resource simplifica index, create, store, edit, update, destroy)
        Route::resource('usuarios', UserController::class);
        Route::patch('usuarios/{id}/restore', [UserController::class, 'restore'])->name('usuarios.restore');

        // D. ROLES
        Route::resource('roles', RoleController::class);

        // E. PRODUCTOS
        // La URL será /admin/products
        Route::resource('products', ProductController::class)->except(['show']);

        // F. AJUSTES
        Route::get('/ajustes', [AjusteController::class, 'index'])->name('ajustes.index');
        Route::post('/ajustes', [AjusteController::class, 'store'])->name('ajustes.store');

    });


// 4. RUTAS DE AUTENTICACIÓN (Login, Register, etc.)
require __DIR__ . '/auth.php';