<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Correa de Paseo Premium',
            'description' => 'Correa ergonómica de 2 metros para perros grandes.',
            'price' => 19.99,
            'stock' => 50,
        ]);
        
        // Agrega más productos aquí...
    }
}