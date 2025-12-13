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
        // Usamos firstOrCreate para evitar errores si lo corres dos veces
        Role::firstOrCreate(['name' => 'Super Admin']);
        Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'Cliente']);

        // Opcional: Si tienes permisos, los crearías aquí:
        // Permission::firstOrCreate(['name' => 'manage products']);
        // $adminRole->givePermissionTo('manage products');


        // 3. Asignar Roles a Usuarios

        // Busca al usuario administrador de prueba
        // Asumo que tu usuario admin fue creado con este email en el DatabaseSeeder
        $user = User::where('email', 'super@admin.com')->first();

        // Si el usuario existe, le asignamos el rol 'Admin'
        if ($user) {
            $user->assignRole('Super Admin');
            $this->command->info("Rol 'Super Admin' asignado a super@admin.com.");
        } else {
            $this->command->error("Usuario super@admin.com no encontrado. Asegúrate de que exista.");
        }

        $this->command->info('Roles y Permisos iniciales creados y asignados.');
    }
}