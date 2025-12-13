<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\AjusteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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



    // C. Configuración del sistema (INDEX)
    Route::get('admin/ajustes', [AjusteController::class, 'index'])->name('admin.ajustes.index');


    Route::post('admin/ajustes/create', [AjusteController::class, 'store'])->name('admin.ajustes.store');



    // D. Roles
    Route::get('admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');

    Route::get('admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');

    Route::post('admin/roles/store', [RoleController::class, 'store'])->name('admin.roles.store');

    Route::get('admin/roles/{id}', [RoleController::class, 'show'])->name('admin.roles.show');

    Route::get('admin/role/{id}', [RoleController::class, 'edit'])->name('admin.roles.edit');

    Route::put('admin/role/{id}', [RoleController::class, 'update'])->name('admin.roles.update');

    Route::delete('admin/role/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');



    // A. DASHBOARD (Ruta principal de entrada tras el login)
    // Route::get('admin', function () {
    //     // Esta es la vista donde el usuario ve su cuenta, historial, etc.
    //     return view('admin.usuarios.index');
    // })->name('admin.usuarios.index');

    // // B. GESTIÓN DE PRODUCTOS (CRUD)
    // // Esto define products.index, products.create, products.store, products.edit, products.update, products.destroy
    // Route::resource('products', ProductController::class)->except(['show']);

    // // C. PERFIL DE USUARIO
    // // Las rutas de ProfileController se definen aquí o en auth/profile.php
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //3. RUTAS USUARIOS
    Route::get('admin/usuarios', [UserController::class, 'index'])->name('admin.usuarios.index');

    Route::get('admin/usuarios/create', [UserController::class, 'create'])->name('admin.usuarios.create');

    Route::post('admin/usuarios/store', [UserController::class, 'store'])->name('admin.usuarios.store');

    Route::get('admin/usuarios/{id}', [UserController::class, 'show'])->name('admin.usuarios.show');

    Route::get('admin/usuarios/{id}', [UserController::class, 'edit'])->name('admin.usuarios.edit');

    Route::put('admin/usuarios/{id}', [UserController::class, 'update'])->name('admin.usuarios.update');

    Route::delete('admin/usuarios/{id}', [UserController::class, 'destroy'])->name('admin.usuarios.destroy');

});

// 3. INCLUSIÓN DE RUTAS DE AUTENTICACIÓN
// El archivo auth.php contiene /login, /register, /logout, etc. 
// Es vital que este require esté al final y FUERA de cualquier middleware 'auth' 
// para que las rutas de login sean accesibles para visitantes.
require __DIR__ . '/auth.php';