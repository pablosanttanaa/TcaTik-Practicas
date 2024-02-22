<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Papas fritas',
                'precio' => 2.5,
                'observaciones' => 'Crujientes y saladas',
                'categoria_id' => 1,
            ],
            [
                'nombre' => 'Leche',
                'precio' => 1.2,
                'observaciones' => 'Desnatada',
                'categoria_id' => 4,
            ],
            [
                'nombre' => 'Agua',
                'precio' => 1.0,
                'observaciones' => 'Embotellada',
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'Coca-Cola',
                'precio' => 0.6,
                'observaciones' => 'Con gas',
                'categoria_id' => 2,
            ],

            [
                'nombre' => 'Galletas',
                'precio' => 1.8,
                'observaciones' => 'Integrales',
                'categoria_id' => 1,
            ],
            [
                'nombre' => 'Yogur',
                'precio' => 0.9,
                'observaciones' => 'Natural',
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'Jugo de naranja',
                'precio' => 1.5,
                'observaciones' => 'Recién exprimido',
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'Manzanas',
                'precio' => 0.7,
                'observaciones' => 'Fuji',
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Plátanos',
                'precio' => 0.5,
                'observaciones' => 'Canarias',
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Pasta',
                'precio' => 1.2,
                'observaciones' => 'Espaguetis',
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Arroz',
                'precio' => 0.8,
                'observaciones' => 'Basmati',
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Hamburguesas',
                'precio' => 3.0,
                'observaciones' => 'De pollo',
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Pan',
                'precio' => 1.0,
                'observaciones' => 'Integral con semillas',
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Café',
                'precio' => 2.0,
                'observaciones' => 'Descafeinado',
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'Té',
                'precio' => 1.5,
                'observaciones' => 'Verde',
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'Pollo',
                'precio' => 5.0,
                'observaciones' => 'Pequeño',
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Carne de res',
                'precio' => 8.0,
                'observaciones' => 'Entrecot',
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Queso',
                'precio' => 2.3,
                'observaciones' => 'Gouda',
                'categoria_id' => 4,
            ],
            [
                'nombre' => 'Huevos',
                'precio' => 1.5,
                'observaciones' => 'Camperos',
                'categoria_id' => 4,
            ],
            [
                'nombre' => 'Monster',
                'precio' => 1.5,
                'observaciones' => 'Energy drink',
                'categoria_id' => 2,
            ],
        ]);

        // Relación de productos con almacenes
        DB::table('productos_has_almacens')->insert([
            ['producto_id' => 1, 'almacen_id' => 1], // Papas fritas en Almacén A
            ['producto_id' => 2, 'almacen_id' => 2], // Leche en Almacén B
            ['producto_id' => 3, 'almacen_id' => 3], // Agua en Almacén C
            ['producto_id' => 4, 'almacen_id' => 4], // Coca-Cola en Almacén B
            ['producto_id' => 5, 'almacen_id' => 4],
            ['producto_id' => 6, 'almacen_id' => 3],
            ['producto_id' => 7, 'almacen_id' => 4],
            ['producto_id' => 8, 'almacen_id' => 1],
            ['producto_id' => 9, 'almacen_id' => 1],
            ['producto_id' => 10, 'almacen_id' => 2],
            ['producto_id' => 11, 'almacen_id' => 4],
            ['producto_id' => 12, 'almacen_id' => 2],
            ['producto_id' => 13, 'almacen_id' => 2],
            ['producto_id' => 14, 'almacen_id' => 1],
            ['producto_id' => 15, 'almacen_id' => 3],
            ['producto_id' => 16, 'almacen_id' => 2],
            ['producto_id' => 17, 'almacen_id' => 2],
            ['producto_id' => 18, 'almacen_id' => 1],
            ['producto_id' => 19, 'almacen_id' => 3],
            ['producto_id' => 20, 'almacen_id' => 3],
        ]);
    }
}
