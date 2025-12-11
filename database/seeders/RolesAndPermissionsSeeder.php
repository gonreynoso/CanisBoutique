<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Asegúrate de que esta ruta sea correcta para tu modelo User
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        // 1. Resetear el caché de roles y permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Crear Roles
        // Nota: Spatie usa el campo 'guard_name', por defecto es 'web'
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $clientRole = Role::firstOrCreate(['name' => 'Cliente']);
        
        // Opcional: Si tienes permisos, los crearías aquí:
        // Permission::firstOrCreate(['name' => 'manage products']);
        // $adminRole->givePermissionTo('manage products');


        // 3. Asignar Roles a Usuarios
        
        // Busca al usuario administrador de prueba
        // Asumo que tu usuario admin fue creado con este email en el DatabaseSeeder
        $user = User::where('email', 'admin@canisboutique.com')->first();
        
        // Si el usuario existe, le asignamos el rol 'Admin'
        if ($user) {
            $user->assignRole($adminRole);
            $this->command->info("Rol 'Admin' asignado a admin@canisboutique.com.");
        } else {
            $this->command->error("Usuario admin@canisboutique.com no encontrado. Asegúrate de que exista.");
        }

        $this->command->info('Roles y Permisos iniciales creados y asignados.');
    }
}