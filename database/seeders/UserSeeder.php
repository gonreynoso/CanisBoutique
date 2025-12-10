<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Usuario Administrador (Para el panel de Mazer)
        User::create([
            'name' => 'Admin CanisBoutique',
            'email' => 'admin@canisboutique.com',
            'phone_number' => '5551234567',
            'password' => Hash::make('password'), // Contraseña simple para pruebas
            // Si tienes un campo 'is_admin' o 'role_id', añádelo aquí
            // 'is_admin' => true,
        ]);

        // 2. Usuario Cliente Normal (Para probar la compra/frontend)
        User::create([
            'name' => 'Gonzalo Cliente',
            'email' => 'gonzalo@cliente.com',
            'phone_number' => '5559876543',
            'password' => Hash::make('password'),
        ]);
        
        // Opcional: Crear 10 usuarios falsos más
        // User::factory(10)->create();
    }
}