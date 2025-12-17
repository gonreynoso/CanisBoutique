<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\AjusteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\AdminTurnoController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminController;

/*
| 1. RUTAS PÚBLICAS 
*/

Route::get('/', [StoreController::class, 'home'])->name('web.index');


Route::get('/reservar', [TurnoController::class, 'create'])->name('web.reservar');
Route::post('/reservar', [TurnoController::class, 'store'])->name('web.reservar.store');
Route::get('/reserva-confirmada', function () {
    return view('web.reservaConfirmada');
})->name('web.reservaConfirmada');


Route::get('/tienda', [StoreController::class, 'index'])->name('tienda.index');
Route::get('/tienda/producto/{id}', [StoreController::class, 'show'])->name('tienda.show');
Route::get('/carrito', [StoreController::class, 'cart'])->name('tienda.cart');


Route::get('/carrito', [StoreController::class, 'cart'])->name('tienda.cart');
Route::get('/carrito/agregar/{id}', [StoreController::class, 'addToCart'])->name('carrito.add');
Route::get('/carrito/eliminar/{id}', [StoreController::class, 'removeFromCart'])->name('carrito.remove');
Route::get('/carrito/incrementar/{id}', [StoreController::class, 'increaseQuantity'])->name('cart.increase');
Route::get('/carrito/disminuir/{id}', [StoreController::class, 'decreaseQuantity'])->name('cart.decrease');



Route::get('/checkout', [StoreController::class, 'checkout'])->name('tienda.checkout');
Route::post('/checkout', [StoreController::class, 'processOrder'])->name('tienda.processOrder');
Route::get('/compra-exitosa/{id}', [StoreController::class, 'orderSuccess'])->name('tienda.success');


Route::get('/contacto', function () {
    return view('web.contact');
})->name('web.contacto');

// Login Social (Google)
Route::middleware('guest')->group(function () {
    Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);
});


/*
| 2. RUTAS DE CLIENTE (Requieren Login, pero NO son Admin)
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Checkout y Perfil
    Route::get('/mi-cuenta', [StoreController::class, 'profile'])->name('web.perfil');

});


/*
| 3. PANEL ADMINISTRATIVO
*/

Route::middleware(['auth', 'verified', 'can:ver_panel_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/turnos', [AdminTurnoController::class, 'index'])->name('turnos.index');
        Route::get('/turnos/datos', [AdminTurnoController::class, 'datos'])->name('turnos.datos');
        Route::delete('/turnos/{id}', [AdminTurnoController::class, 'destroy'])->name('turnos.destroy');


        Route::resource('usuarios', UserController::class);
        Route::patch('usuarios/{id}/restore', [UserController::class, 'restore'])->name('usuarios.restore');


        Route::resource('roles', RoleController::class);

        Route::resource('productos', ProductController::class)
            ->parameters(['productos' => 'product'])
            ->except(['show']);

        Route::get('/ajustes', [AjusteController::class, 'index'])->name('ajustes.index');
        Route::post('/ajustes', [AjusteController::class, 'store'])->name('ajustes.store');



    });

require __DIR__ . '/auth.php';