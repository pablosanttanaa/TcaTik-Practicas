<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmacenesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('almacens')->insert([
            ['nombre' => 'Arinaga'],
            ['nombre' => 'Pozo Izquierdo'],
            ['nombre' => 'Maspalomas'],
            ['nombre' => 'Arguineguín'],
        ]);
    }
}
