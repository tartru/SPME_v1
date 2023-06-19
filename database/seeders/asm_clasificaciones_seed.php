<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class asm_clasificaciones_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('asm_clasificaciones')->insert(['nombre' => 'Específico','descripcion' => '','created_at' => now()]);
        DB::table('asm_clasificaciones')->insert(['nombre' => 'Institucional','descripcion' => '','created_at' => now()]);
        DB::table('asm_clasificaciones')->insert(['nombre' => 'Interinstitucional','descripcion' => '','created_at' => now()]);
        DB::table('asm_clasificaciones')->insert(['nombre' => 'Intergubernamental','descripcion' => '','created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
