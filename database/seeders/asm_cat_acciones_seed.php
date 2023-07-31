<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class asm_cat_acciones_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'asm_cat_acciones';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
 
        DB::table($table)->insert(['nombre' => 'Corrige','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Modifica','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Adiciona','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Reorienta','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Suspende parcial o totalmente','descripcion' => '','created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }
}
