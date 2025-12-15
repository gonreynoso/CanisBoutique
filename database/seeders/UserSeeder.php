<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // NOTA: Idealmente esto iría en un RoleSeeder, pero lo dejamos aquí por ahora.
        $roles = ['SUPER ADMIN', 'ADMINISTRADOR', 'CLIENTE', 'VENDEDOR', 'PELUQUERO'];
        foreach ($roles as $rol) {
            Role::firstOrCreate(['name' => $rol, 'guard_name' => 'web']);
        }

        // 1. SUPER ADMIN
        $superAdmin = User::create([
            'name' => 'Gonzalo Reynoso',
            'email' => 'super@admin.com',
            'password' => Hash::make('dada'),
            // 'phone_number' => null, // Asumo que puede ser nulo
        ]);
        $superAdmin->assignRole('SUPER ADMIN');

        // 2. ADMIN
        $admin = User::create([
            'name' => 'ADMIN CANISBOUTIQUE',
            'email' => 'admin@admin.com',
            'phone_number' => '1111111111',
            'password' => Hash::make('dada'),
        ]);
        $admin->assignRole('ADMINISTRADOR');

        // 3. VENDEDOR (CORREGIDO)
        $vendedor = User::create([
            'name' => 'Marcos Madero',
            'email' => 'marcos@madero.com',
            'phone_number' => '2222222222',
            'password' => Hash::make('dada'),
        ]);
        $vendedor->assignRole('VENDEDOR'); // <--- AQUI ESTABA EL ERROR

        // 4. CLIENTES (Usando un array para no repetir variables)
        $clientes = [
            ['name' => 'Cliente Canis', 'email' => 'cliente@cliente.com', 'phone' => '3333333331'],
            ['name' => 'Juan Perez', 'email' => 'juan@perez.com', 'phone' => '3333333332'],
            ['name' => 'Maria Rodriguez', 'email' => 'maria@rodriguez.com', 'phone' => '3333333333'],
        ];

        foreach ($clientes as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone'],
                'password' => Hash::make('dada'),
            ]);
            $user->assignRole('CLIENTE');
        }

        // 5. PELUQUEROS
        $peluqueros = [
            ['name' => 'Pedro Ramirez', 'email' => 'pedro@ramirez.com', 'phone' => '4444444441'],
            ['name' => 'Ana Gonzalez', 'email' => 'ana@gonzalez.com', 'phone' => '4444444442'],
            ['name' => 'Luisa Martinez', 'email' => 'luisa@martinez.com', 'phone' => '4444444443'],
        ];

        foreach ($peluqueros as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone'],
                'password' => Hash::make('dada'),
            ]);
            $user->assignRole('PELUQUERO');
        }
    }
}