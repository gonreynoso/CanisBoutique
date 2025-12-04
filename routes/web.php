<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Importación necesaria

// 1. RUTAS PÚBLICAS (HOME)
Route::get('/', function () {
    // Aquí es donde se carga tu componente <x-header />
    return view('welcome');
});


// 2. RUTAS PROTEGIDAS (AUTH/VERIFIED)
Route::middleware(['auth', 'verified'])->group(function () {

    // A. DASHBOARD (Ruta principal de entrada tras el login)
    Route::get('/dashboard', function () {
        // Esta es la vista donde el usuario ve su cuenta, historial, etc.
        return view('dashboard');
    })->name('dashboard');

    // B. GESTIÓN DE PRODUCTOS (CRUD)
    // Esto define products.index, products.create, products.store, products.edit, products.update, products.destroy
    Route::resource('products', ProductController::class)->except(['show']);

    // C. PERFIL DE USUARIO
    // Las rutas de ProfileController se definen aquí o en auth/profile.php
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Si tienes archivos auth.php y profile.php separados, inclúyelos (si Breeze no lo hace automáticamente)
    // require __DIR__ . '/auth.php'; // Las rutas de login/register ya se cargan desde aquí
    // require __DIR__ . '/profile.php'; 
});

// 3. INCLUSIÓN DE RUTAS DE AUTENTICACIÓN
// El archivo auth.php contiene /login, /register, /logout, etc. 
// Es vital que este require esté al final y FUERA de cualquier middleware 'auth' 
// para que las rutas de login sean accesibles para visitantes.
require __DIR__ . '/auth.php';