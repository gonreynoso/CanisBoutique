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
            'phone_number' => '1111111111',
        ]);
        $superAdmin->assignRole('SUPER ADMIN');
        // 2. ADMIN
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'phone_number' => '1111111111',
            'password' => Hash::make('dada'),
        ]);
        $admin->assignRole('ADMINISTRADOR');

        // 3. VENDEDOR 
        $vendedor = User::create([
            'name' => 'Marcos Vendedor',
            'email' => 'vendedor@vendedor.com',
            'phone_number' => '2222222222',
            'password' => Hash::make('dada'),
        ]);
        $vendedor->assignRole('VENDEDOR');

        // 4. CLIENTES (Usando un array para no repetir variables)
        $clientes = [
            ['name' => 'Cliente', 'email' => 'cliente@cliente.com', 'phone' => '3333333331'],
            ['name' => 'Juan Cliente', 'email' => 'juan@cliente.com', 'phone' => '3333333332'],
            ['name' => 'Maria Cliente', 'email' => 'maria@cliente.com', 'phone' => '3333333333'],
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
            ['name' => 'Pedro Peluquero', 'email' => 'peluquero@peluquero.com', 'phone' => '4444444441', 'password' => Hash::make('dada')],
            ['name' => 'Ana Peluquero', 'email' => 'ana@peluquero.com', 'phone' => '4444444442', 'password' => Hash::make('dada')],
            ['name' => 'Luisa Peluquero', 'email' => 'luisa@peluquero.com', 'phone' => '4444444443', 'password' => Hash::make('dada')],
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