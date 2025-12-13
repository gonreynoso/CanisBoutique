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
        Role::firstOrCreate(['name' => 'ADMIN', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'CLIENTE', 'guard_name' => 'web']);

        // 1. SUPER ADMIN (Acceso total al sistema)
        $superAdmin = User::create([
            'name' => 'SUPER ADMIN',
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
        $admin->assignRole('ADMIN');

        // 3. CLIENTE (Usuario normal que compra)
        $cliente = User::create([
            'name' => 'CLIENTE CANISBOUTIQUE',
            'email' => 'g@cliente.com',
            'phone_number' => '5559876543',
            'password' => Hash::make('dada'),
        ]);
        $cliente->assignRole('CLIENTE');
    }

}