<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class asm_temas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('asm_temas')->insert(['nombre' => 'Diseño','descripcion' => '','created_at' => now()]);
        DB::table('asm_temas')->insert(['nombre' => 'Operación','descripcion' => '','created_at' => now()]);
        DB::table('asm_temas')->insert(['nombre' => 'Resultados','descripcion' => '','created_at' => now()]);
        DB::table('asm_temas')->insert(['nombre' => 'Productos','descripcion' => '','created_at' => now()]);
        DB::table('asm_temas')->insert(['nombre' => 'Indicadores','descripcion' => '','created_at' => now()]);
        DB::table('asm_temas')->insert(['nombre' => 'Cobertura','descripcion' => '','created_at' => now()]);
        DB::table('asm_temas')->insert(['nombre' => 'Planeación','descripcion' => '','created_at' => now()]);
        DB::table('asm_temas')->insert(['nombre' => 'Ejecución','descripcion' => '','created_at' => now()]);
        DB::table('asm_temas')->insert(['nombre' => 'Otros','descripcion' => '','created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }
}
