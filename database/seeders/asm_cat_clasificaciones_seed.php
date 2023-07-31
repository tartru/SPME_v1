<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class asm_cat_clasificaciones_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'asm_cat_clasificaciones';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
 
        DB::table($table)->insert(['nombre' => 'Específico','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Institucional','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Interinstitucional','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Intergubernamental','descripcion' => '','created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
