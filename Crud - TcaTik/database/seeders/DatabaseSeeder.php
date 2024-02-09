<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductosTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AlmacenesTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
    }
}
