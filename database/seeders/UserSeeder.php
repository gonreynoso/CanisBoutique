<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;

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
        // Spatie Permission: aseguramos que los roles existan antes de asignarlos
        Role::firstOrCreate(['name' => 'SUPER ADMIN', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'ADMINISTRADOR', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'CLIENTE', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'VENDEDOR', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'PELUQUERO', 'guard_name' => 'web']);


        // 1. SUPER ADMIN (Acceso total al sistema)
        $superAdmin = User::create([
            'name' => 'Gonzalo Reynoso',
            'email' => 'super@admin.com',
            'password' => Hash::make('dada'),
        ]);
        $superAdmin->assignRole('SUPER ADMIN');

        // 2. ADMIN (Dueño del negocio / Empleado)
        $admin = User::create([
            'name' => 'ADMIN CANISBOUTIQUE',
            'email' => 'admin@admin.com',
            'phone_number' => '5551234567',
            'password' => Hash::make('dada'),
        ]);
        $admin->assignRole('ADMINISTRADOR');

        // 3. CLIENTE (Usuario normal que compra)
        $cliente = User::create([
            'name' => 'CLIENTE CANISBOUTIQUE',
            'email' => 'cliente@cliente.com',
            'phone_number' => '5559876543',
            'password' => Hash::make('dada'),
        ]);
        $cliente->assignRole('CLIENTE');

        // 4. VENDEDOR (Usuario normal que compra)
        $vendedor = User::create([
            'name' => 'Marcos Madero',
            'email' => 'marcos@madero.com',
            'phone_number' => '5559876543',
            'password' => Hash::make('dada'),
        ]);
        $vendedor->assignRole('CLIENTE');

        // 5. CLIENTE (Usuario normal que compra)
        $cliente = User::create([
            'name' => 'Juan Perez',
            'email' => 'juan@perez.com',
            'phone_number' => '5559876543',
            'password' => Hash::make('dada'),
        ]);
        $cliente->assignRole('CLIENTE');

        $cliente = User::create([
            'name' => 'Maria Rodriguez',
            'email' => 'maria@rodriguez.com',
            'phone_number' => '5559876543',
            'password' => Hash::make('dada'),
        ]);
        $cliente->assignRole('CLIENTE');

        $peluquero = User::create([
            'name' => 'Pedro Ramirez',
            'email' => 'pedro@ramirez.com',
            'phone_number' => '5559876543',
            'password' => Hash::make('dada'),
        ]);
        $peluquero->assignRole('PELUQUERO');

        $peluquero = User::create([
            'name' => 'Ana Gonzalez',
            'email' => 'ana@gonzalez.com',
            'phone_number' => '5559876543',
            'password' => Hash::make('dada'),
        ]);
        $peluquero->assignRole('PELUQUERO');

        $peluquero = User::create([
            'name' => 'Luisa Martinez',
            'email' => 'luisa@martinez.com',
            'phone_number' => '5559876543',
            'password' => Hash::make('dada'),
        ]);
        $peluquero->assignRole('PELUQUERO');
    }

}