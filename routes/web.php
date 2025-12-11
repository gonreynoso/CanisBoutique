<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\AjusteController;
use App\Http\Controllers\RoleController;

// 1. RUTAS PÚBLICAS (HOME)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);
});


// 2. RUTAS PROTEGIDAS (AUTH/VERIFIED)
Route::middleware(['auth', 'verified'])->group(function () {

    // A. DASHBOARD (Ruta principal de entrada tras el login)
    Route::get('admin', function () {
        // Esta es la vista donde el usuario ve su cuenta, historial, etc.
        return view('admin.index');
    })->name('admin');

    // B. GESTIÓN DE PRODUCTOS (CRUD)
    // Esto define products.index, products.create, products.store, products.edit, products.update, products.destroy
    Route::resource('products', ProductController::class)->except(['show']);

    // C. PERFIL DE USUARIO
    // Las rutas de ProfileController se definen aquí o en auth/profile.php
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // D. Configuración del sistema (INDEX)
    Route::get('admin/ajustes', [AjusteController::class, 'index'])->name('admin.ajustes.index');

    // E. Configuración del sistema (CREATE)
    Route::post('admin/ajustes/create', [AjusteController::class, 'store'])->name('admin.ajustes.store');

    // F. Roles
    Route::get('admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');

    Route::get('admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');

    Route::post('admin/roles/store', [RoleController::class, 'store'])->name('admin.roles.store');
    
});

// 3. INCLUSIÓN DE RUTAS DE AUTENTICACIÓN
// El archivo auth.php contiene /login, /register, /logout, etc. 
// Es vital que este require esté al final y FUERA de cualquier middleware 'auth' 
// para que las rutas de login sean accesibles para visitantes.
require __DIR__ . '/auth.php';