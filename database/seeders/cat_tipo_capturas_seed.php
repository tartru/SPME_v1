<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_tipo_capturas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('cat_tipo_capturas')->insert(['nombre' =>  'Nacional','descripcion' =>  'La captura de información es de valor nacional','active' => 1,'deleted' =>0,'created_at' =>  '2023-05-17 14:51:39']);
        DB::table('cat_tipo_capturas')->insert(['nombre' =>  'Estados','descripcion' =>  'La captura de información es por estados','active' => 1,'deleted' =>0,'created_at' =>  '2023-05-17 14:51:39']);
        DB::table('cat_tipo_capturas')->insert(['nombre' =>  'No regionalizado','descripcion' =>  'La captura de información no es por regiones','active' => 1,'deleted' =>0,'created_at' =>  '2023-05-17 14:51:39']);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }
}
