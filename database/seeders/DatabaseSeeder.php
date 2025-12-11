<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // LLAMADA ÚNICA: La secuencia de ejecución está garantizada
        $this->call([
            // 1. CREACIÓN DE DEPENDENCIAS (El usuario Admin DEBE existir primero)
            UserSeeder::class, 
            
            // 2. CONFIGURACIÓN DE SEGURIDAD (Asigna el rol al usuario que ya existe)
            RolesAndPermissionsSeeder::class, 

            // 3. DATOS DE APLICACIÓN (Pueden depender de usuarios/roles)
            ProductSeeder::class,
            // CategorySeeder::class,
            // ... Otros seeders
        ]);
    }
}
