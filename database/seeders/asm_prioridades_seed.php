<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class asm_prioridades_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'asm_prioridades';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
  
        DB::table($table)->insert(['nombre' => 'Alta','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Media','descripcion' => '','created_at' => now()]);
        DB::table($table)->insert(['nombre' => 'Baja','descripcion' => '','created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
