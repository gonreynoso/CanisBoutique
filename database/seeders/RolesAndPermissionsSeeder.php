<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; // <--- IMPORTANTE: No olvides importar esto

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Resetear el caché de roles y permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. CREAR PERMISOS (Las acciones específicas)
        // Permiso clave para seguridad:
        Permission::firstOrCreate(['name' => 'ver_panel_admin']);

        // Permisos de Usuarios:
        Permission::firstOrCreate(['name' => 'ver_usuarios']);
        Permission::firstOrCreate(['name' => 'crear_usuarios']);
        Permission::firstOrCreate(['name' => 'editar_usuarios']);
        Permission::firstOrCreate(['name' => 'borrar_usuarios']);

        // Permisos de Turnos:
        Permission::firstOrCreate(['name' => 'ver_turnos']);
        Permission::firstOrCreate(['name' => 'gestionar_turnos']); // Crear/Editar turnos

        // 3. CREAR ROLES Y ASIGNAR PERMISOS

        // --- CLIENTE ---
        // No le damos ningún permiso de administración.
        $role = Role::firstOrCreate(['name' => 'CLIENTE']);

        // --- PELUQUERO ---
        // Puede entrar al panel y ver turnos, pero no tocar usuarios.
        $role = Role::firstOrCreate(['name' => 'PELUQUERO']);
        $role->givePermissionTo(['ver_panel_admin', 'ver_turnos', 'gestionar_turnos']);

        // --- VENDEDOR ---
        // Similar al peluquero (puedes ajustar si necesita ver usuarios sin editar)
        $role = Role::firstOrCreate(['name' => 'VENDEDOR']);
        $role->givePermissionTo(['ver_panel_admin', 'ver_turnos', 'gestionar_turnos', 'ver_usuarios']);

        // --- ADMINISTRADOR ---
        // Tiene todos los permisos explícitos
        $role = Role::firstOrCreate(['name' => 'ADMINISTRADOR']);
        $role->givePermissionTo(Permission::all());

        // --- SUPER ADMIN ---
        // Se crea el rol (la lógica de "poder absoluto" la haremos en el AuthServiceProvider después)
        $role = Role::firstOrCreate(['name' => 'SUPER ADMIN']);
        $role->givePermissionTo(Permission::all()); // Por seguridad le damos todo también aquí


        // 4. Asignar Rol al Super Usuario (Tu cuenta)
        $user = User::where('email', 'super@admin.com')->first();

        if ($user) {
            $user->assignRole('SUPER ADMIN');
            $this->command->info("Rol 'SUPER ADMIN' y permisos asignados a super@admin.com.");
        }

        $this->command->info('Estructura de seguridad actualizada correctamente.');
    }
}