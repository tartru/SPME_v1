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
        $table = 'asm_temas';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
   
        DB::table($table)->insert(['nombre' => 'Diseño','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Operación','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Resultados','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Productos','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Indicadores','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Cobertura','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Planeación','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Ejecución','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Otros','descripcion' => '','created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }
}
