<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class asm_selecciones_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('asm_selecciones')->insert(['nombre' => 'Clara','descripcion' => '','created_at' => now()]);
        DB::table('asm_selecciones')->insert(['nombre' => 'Justificable','descripcion' => '','created_at' => now()]);
        DB::table('asm_selecciones')->insert(['nombre' => 'Relevante','descripcion' => '','created_at' => now()]);
        DB::table('asm_selecciones')->insert(['nombre' => 'Factible','descripcion' => '','created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
