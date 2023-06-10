<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_frecuencias_mediciones_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 0.17,'nombre' =>  'Sexenal','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 0.2,'nombre' =>  'Quinquenal','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 0.34,'nombre' =>  'Trienal','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 0.5,'nombre' =>  'Bianual','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 1,'nombre' =>  'Anual','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 2,'nombre' =>  'Semestre','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 3,'nombre' =>  'Cuatrimestre','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 4,'nombre' =>  'Trimestre','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 6,'nombre' =>  'Bimestre','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 12,'nombre' =>  'Mensual','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::table('cat_frecuencias_mediciones')->insert(['valor' => 0,'nombre' =>  'Dato Ãºnico','descripcion' => '','active' =>1,'deleted' => 0]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }
}
