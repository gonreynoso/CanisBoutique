<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiamos la tabla antes de insertar para evitar duplicados al probar
        // DB::table('products')->truncate(); // Descomenta si quieres borrar todo antes de sembrar

        $productos = [
            // ==========================================
            // CATEOGORÍA: ALIMENTOS (10 items)
            // ==========================================
            [
                'nombre' => 'Alimento Premium Adultos 15kg',
                'descripcion' => 'Balanceado completo para perros adultos de raza mediana y grande. Alta digestibilidad.',
                'precio' => 45000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1589924691195-41432c84c161?auto=format&fit=crop&w=600&q=80',
                'stock' => 20,
            ],
            [
                'nombre' => 'Cachorros Raza Pequeña 3kg',
                'descripcion' => 'Fórmula especial para el crecimiento acelerado de razas pequeñas. Croqueta mini.',
                'precio' => 18500.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1623366302587-b38b1ddaefd9?auto=format&fit=crop&w=600&q=80',
                'stock' => 15,
            ],
            [
                'nombre' => 'Snacks Naturales de Hígado',
                'descripcion' => 'Premios deshidratados 100% naturales. Sin conservantes. Ideales para entrenar.',
                'precio' => 8500.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1585849834654-f8a9b86035a3?auto=format&fit=crop&w=600&q=80',
                'stock' => 50,
            ],
            [
                'nombre' => 'Alimento Hipoalergénico 7kg',
                'descripcion' => 'Para perros con estómago sensible o alergias alimentarias. Proteína de salmón.',
                'precio' => 32000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1608408843596-b311965e04cb?auto=format&fit=crop&w=600&q=80',
                'stock' => 10,
            ],
            [
                'nombre' => 'Latas de Paté de Cordero',
                'descripcion' => 'Alimento húmedo gourmet. Pack x 6 unidades. Sabor irresistible.',
                'precio' => 12000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1585560662266-932d5e236167?auto=format&fit=crop&w=600&q=80',
                'stock' => 30,
            ],
            [
                'nombre' => 'Barritas Dentales (Pack x10)',
                'descripcion' => 'Ayudan a reducir el sarro y mantener el aliento fresco. Uso diario.',
                'precio' => 5500.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1517457210348-703079e57d4b?auto=format&fit=crop&w=600&q=80',
                'stock' => 100,
            ],
            [
                'nombre' => 'Alimento Senior +7 Años 10kg',
                'descripcion' => 'Bajo en calorías y con condroprotectores para las articulaciones de perros mayores.',
                'precio' => 38000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1589924691195-41432c84c161?auto=format&fit=crop&w=600&q=80',
                'stock' => 12,
            ],
            [
                'nombre' => 'Galletas Horneadas de Avena',
                'descripcion' => 'Snack saludable rico en fibra. Apto para perros con sobrepeso.',
                'precio' => 6200.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1605218427360-3a618e24c568?auto=format&fit=crop&w=600&q=80',
                'stock' => 40,
            ],
            [
                'nombre' => 'Aceite de Salmón Puro',
                'descripcion' => 'Suplemento Omega 3 para un pelaje brillante y piel sana. Botella 500ml.',
                'precio' => 15000.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1620917670397-a3313280dd65?auto=format&fit=crop&w=600&q=80',
                'stock' => 25,
            ],
            [
                'nombre' => 'Mix de Verduras Deshidratadas',
                'descripcion' => 'Complemento para dieta BARF o balanceada. Solo agregar agua.',
                'precio' => 9800.00,
                'categoria' => 'alimentos',
                'imagen_url' => 'https://images.unsplash.com/photo-1518914781460-a3daa46cebf6?auto=format&fit=crop&w=600&q=80',
                'stock' => 18,
            ],

            // ==========================================
            // CATEOGORÍA: JUGUETES (10 items)
            // ==========================================
            [
                'nombre' => 'Soga Mordillo Trenzada XL',
                'descripcion' => 'Cuerda extra fuerte para perros destructores. Ideal para jugar a tironear.',
                'precio' => 12000.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1576201836106-db1758fd1c97?auto=format&fit=crop&w=600&q=80',
                'stock' => 15,
            ],
            [
                'nombre' => 'Pelota de Goma Rebotona',
                'descripcion' => 'Caucho natural, rebote errático. Imposible de romper fácilmente.',
                'precio' => 9500.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1615266895738-11f1371cd7e5?auto=format&fit=crop&w=600&q=80',
                'stock' => 30,
            ],
            [
                'nombre' => 'Peluche con Sonido (Pato)',
                'descripcion' => 'Suave y con chirriador interno. Ideal para perros que no destrozan.',
                'precio' => 7800.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1535930749574-1399327ce78f?auto=format&fit=crop&w=600&q=80',
                'stock' => 20,
            ],
            [
                'nombre' => 'Kong Rellenable Rojo',
                'descripcion' => 'El clásico juguete para rellenar con comida y combatir la ansiedad.',
                'precio' => 22000.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1591946614720-90a587da4a36?auto=format&fit=crop&w=600&q=80',
                'stock' => 25,
            ],
            [
                'nombre' => 'Frisbee Flexible',
                'descripcion' => 'Disco volador de silicona suave, no daña los dientes al atraparlo.',
                'precio' => 6500.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1534361960057-19889db9621e?auto=format&fit=crop&w=600&q=80',
                'stock' => 40,
            ],
            [
                'nombre' => 'Puzzle de Inteligencia Nivel 1',
                'descripcion' => 'Juego interactivo donde el perro debe mover piezas para encontrar premios.',
                'precio' => 18000.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1541364983171-a8ba01e95cfc?auto=format&fit=crop&w=600&q=80',
                'stock' => 8,
            ],
            [
                'nombre' => 'Hueso de Nylon Saborizado',
                'descripcion' => 'Sabor a pollo. Larga duración para masticadores potentes.',
                'precio' => 11500.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1548858807-6c2436894d0d?auto=format&fit=crop&w=600&q=80',
                'stock' => 22,
            ],
            [
                'nombre' => 'Túnel Agilidad Plegable',
                'descripcion' => 'Para entrenar agilidad en el jardín. Se guarda en bolsa pequeña.',
                'precio' => 28000.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1610408542939-f99a53825586?auto=format&fit=crop&w=600&q=80',
                'stock' => 5,
            ],
            [
                'nombre' => 'Pollo de Goma Chillón',
                'descripcion' => 'Clásico juguete ruidoso que divierte a todos (menos a los dueños).',
                'precio' => 4500.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1535295972055-1c762f4483e5?auto=format&fit=crop&w=600&q=80',
                'stock' => 60,
            ],
            [
                'nombre' => 'Lanzador de Pelotas Automático',
                'descripcion' => 'Lanza la pelota para que tu perro corra sin que te canses el brazo.',
                'precio' => 8500.00,
                'categoria' => 'juguetes',
                'imagen_url' => 'https://images.unsplash.com/photo-1587559070757-f72a388edbba?auto=format&fit=crop&w=600&q=80',
                'stock' => 10,
            ],

            // ==========================================
            // CATEOGORÍA: ROPA (10 items)
            // ==========================================
            [
                'nombre' => 'Capa de Lluvia Amarilla',
                'descripcion' => 'Impermeable clásico con capucha y bandas reflectantes. Talle M.',
                'precio' => 25000.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=600&q=80',
                'stock' => 10,
            ],
            [
                'nombre' => 'Suéter de Lana Invierno',
                'descripcion' => 'Abrigo tejido muy suave, color rojo. Mantiene el calor corporal.',
                'precio' => 18000.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?auto=format&fit=crop&w=600&q=80',
                'stock' => 12,
            ],
            [
                'nombre' => 'Pañuelo Bandana "Cool Dog"',
                'descripcion' => 'Accesorio ligero para el cuello con estampa moderna.',
                'precio' => 3500.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1558552395-5cb20912165b?auto=format&fit=crop&w=600&q=80',
                'stock' => 50,
            ],
            [
                'nombre' => 'Botitas para Nieve/Lluvia',
                'descripcion' => 'Set de 4 botas impermeables. Protegen las patas del frío y suciedad.',
                'precio' => 15500.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1453227588063-bb302b62f50b?auto=format&fit=crop&w=600&q=80',
                'stock' => 8,
            ],
            [
                'nombre' => 'Disfraz de Calabaza Halloween',
                'descripcion' => 'Divertido disfraz acolchado para octubre. Talle ajustable.',
                'precio' => 21000.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1508285296758-c0527339893d?auto=format&fit=crop&w=600&q=80',
                'stock' => 15,
            ],
            [
                'nombre' => 'Chaleco Salvavidas Deportivo',
                'descripcion' => 'Seguridad para perros que aman nadar. Color naranja visible.',
                'precio' => 35000.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1575425186775-b8de9a427e67?auto=format&fit=crop&w=600&q=80',
                'stock' => 5,
            ],
            [
                'nombre' => 'Moño de Gala (Bowtie)',
                'descripcion' => 'Moño elegante para ocasiones especiales. Se ajusta al collar.',
                'precio' => 2500.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1596701831889-4a0b678c430e?auto=format&fit=crop&w=600&q=80',
                'stock' => 40,
            ],
            [
                'nombre' => 'Buzo con Capucha (Hoodie)',
                'descripcion' => 'Estilo urbano, tela de algodón frizado. Color gris melange.',
                'precio' => 16500.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1588269845464-8993564348af?auto=format&fit=crop&w=600&q=80',
                'stock' => 20,
            ],
            [
                'nombre' => 'Camisa Hawaiana de Verano',
                'descripcion' => 'Tela fresca y estampada para lucir en la playa.',
                'precio' => 14000.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1601758228041-f3b2795255f1?auto=format&fit=crop&w=600&q=80',
                'stock' => 15,
            ],
            [
                'nombre' => 'Chaleco Reflectivo Nocturno',
                'descripcion' => 'Seguridad vial para paseos nocturnos. Alta visibilidad.',
                'precio' => 9000.00,
                'categoria' => 'ropa',
                'imagen_url' => 'https://images.unsplash.com/photo-1551025119-92c421739f75?auto=format&fit=crop&w=600&q=80',
                'stock' => 30,
            ],
        ];

        // Insertamos los datos
        // Usamos insert en lugar de create para hacerlo en una sola query (más rápido)
        // Pero recuerda agregar 'created_at' y 'updated_at' manualmente si usas insert
        $now = now();
        foreach ($productos as &$producto) {
            $producto['created_at'] = $now;
            $producto['updated_at'] = $now;
            $producto['activo'] = true;
        }

        DB::table('products')->insert($productos);
    }
}