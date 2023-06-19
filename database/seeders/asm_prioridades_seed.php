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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('asm_prioridades')->insert(['nombre' => 'Alta','descripcion' => '','created_at' => now()]);
        DB::table('asm_prioridades')->insert(['nombre' => 'Media','descripcion' => '','created_at' => now()]);
        DB::table('asm_prioridades')->insert(['nombre' => 'Baja','descripcion' => '','created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
