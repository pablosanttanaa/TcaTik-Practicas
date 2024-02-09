<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            ['nombre' => 'Papas fritas', 'precio' => 2.50, 'observaciones'=> 'Ninguna', 'categoria_id' => 1],
            ['nombre' => 'Leche', 'precio' => 1.20, 'observaciones'=> 'Ninguna', 'categoria_id' => 4],
            ['nombre' => 'Agua', 'precio' => 1.00, 'observaciones'=> 'Ninguna', 'categoria_id' => 2],
            ['nombre' => 'Coca-Cola', 'precio' => 0.60, 'observaciones'=> 'Regalada', 'categoria_id' => 2],
        ]);

        // Relación de productos con almacenes. Ejem: Producto 1 en Almacén A
        DB::table('productos_has_almacens')->insert([
            ['producto_id' => 1, 'almacen_id' => 1], // Papas fritas en Almacén A
            ['producto_id' => 2, 'almacen_id' => 2], // Leche en Almacén B
            ['producto_id' => 3, 'almacen_id' => 3], // Agua en Almacén C
            ['producto_id' => 4, 'almacen_id' => 4], // Coca-Cola en Almacén B
        ]);
    }
}
