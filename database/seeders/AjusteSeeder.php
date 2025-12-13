<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ajuste; // <--- ¡Importante importar el Modelo!

class AjusteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Opcional: Limpiar la tabla antes de crear (para evitar duplicados al re-sembrar)
        // Ajuste::truncate(); 

        // Verificamos si ya existe para no crearlo doble
        if (Ajuste::count() == 0) {

            Ajuste::create([
                'nombre' => 'Comercio CanisBoutique',
                'descripcion' => 'Tienda de Mascotas y reservas de turnos',
                'sucursal' => 'CABA',
                'direccion' => 'Malabia 928',
                'telefono' => '0412-5559876543',
                'email' => 'canisboutique@gmail.com',
                'divisa' => 'AR$',
                'pagina_web' => 'canisboutique.com',
            ]);

        }
    }
}