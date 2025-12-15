<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        // Servicio 1: Básico (45 min)
        Servicio::create([
            'nombre' => 'Baño y Cepillado (Perro Chico)',
            'descripcion' => 'Incluye baño con shampoo neutro, secado y cepillado.',
            'duracion_minutos' => 45,
            'precio' => 8500.00,
            'activo' => true,
        ]);

        // Servicio 2: Completo (90 min - Ocupa más tiempo en calendario)
        Servicio::create([
            'nombre' => 'Peluquería Completa (Corte y Baño)',
            'descripcion' => 'Corte de raza, baño, corte de uñas y limpieza de oídos.',
            'duracion_minutos' => 90,
            'precio' => 15000.00,
            'activo' => true,
        ]);

        // Servicio 3: Rápido (15 min)
        Servicio::create([
            'nombre' => 'Corte de Uñas',
            'descripcion' => 'Solo corte y limado de uñas.',
            'duracion_minutos' => 15,
            'precio' => 3000.00,
            'activo' => true,
        ]);

        // Servicio 4: Veterinaria (30 min)
        Servicio::create([
            'nombre' => 'Consulta Veterinaria General',
            'descripcion' => 'Revisión clínica general de la mascota.',
            'duracion_minutos' => 30,
            'precio' => 10000.00,
            'activo' => true,
        ]);
    }
}
