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
                'nombre' => 'Baño Completo',
                'descripcion' => 'Baño relajante, limpieza profunda y secado con turbina.',
                'precio' => 9000,
                'duracion_minutos' => 60,
            ],
            [
                'nombre' => 'Corte y Peinado',
                'descripcion' => 'Adaptado a la raza y estilo de tu mascota para que luzca increíble.',
                'precio' => 15000,
                'duracion_minutos' => 60,
            ],
            [
                'nombre' => 'Cepillado',
                'descripcion' => 'Eliminación de nudos y lana muerta para un pelaje sano.',
                'precio' => 3000,
                'duracion_minutos' => 60,
            ],
            [
                'nombre' => 'Spa de Ozono',
                'descripcion' => 'Tratamiento relajante para pieles sensibles.',
                'precio' => 18000,
                'duracion_minutos' => 120,
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }

    }
}
