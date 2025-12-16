<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        $servicios = [
            [
                'nombre' => 'Baño Completo (Raza Pequeña)',
                'descripcion' => 'Baño con shampoo neutro, corte de uñas y limpieza de oídos.',
                'precio' => 8000,
                'duracion_minutos' => 60,
            ],
            [
                'nombre' => 'Corte y Estilo (Raza Pequeña)',
                'descripcion' => 'Corte de raza o a tijera según preferencia, incluye baño.',
                'precio' => 12000,
                'duracion_minutos' => 90,
            ],
            [
                'nombre' => 'Baño Completo (Raza Grande)',
                'descripcion' => 'Para perros de más de 20kg. Incluye cepillado profundo.',
                'precio' => 15000,
                'duracion_minutos' => 90,
            ],
            [
                'nombre' => 'Corte Higiénico',
                'descripcion' => 'Limpieza de zonas sanitarias y plantares.',
                'precio' => 5000,
                'duracion_minutos' => 30,
            ],
            [
                'nombre' => 'Spa de Ozono',
                'descripcion' => 'Tratamiento relajante para pieles sensibles.',
                'precio' => 18000,
                'duracion_minutos' => 60,
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }

    }
}
