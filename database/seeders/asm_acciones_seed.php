<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class asm_acciones_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('asm_acciones')->insert(['nombre' => 'Corrige','descripcion' => '','created_at' => now()]);
        DB::table('asm_acciones')->insert(['nombre' => 'Modifica','descripcion' => '','created_at' => now()]);
        DB::table('asm_acciones')->insert(['nombre' => 'Adiciona','descripcion' => '','created_at' => now()]);
        DB::table('asm_acciones')->insert(['nombre' => 'Reorienta','descripcion' => '','created_at' => now()]);
        DB::table('asm_acciones')->insert(['nombre' => 'Suspende parcial o totalmente','descripcion' => '','created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }
}
