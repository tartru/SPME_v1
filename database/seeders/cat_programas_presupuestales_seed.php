<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_programas_presupuestales_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'cat_programas_presupuestales';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");

        DB::table($table)->insert(['anio'=>'2014', 'clave' => 'E014', 'nombre' => 'Protección Forestal', 'created_at' => '2023-05-17 14:51:39']);
        DB::table($table)->insert(['anio'=>'2014', 'clave' => 'K138', 'nombre' => 'Programa de Inversión en Infraestructura Social y de Protección Ambiental', 'created_at' => '2023-05-17 14:51:39']);
        DB::table($table)->insert(['anio'=>'2014', 'clave' => 'PIC', 'nombre' => 'Programa Institucional CONAFOR', 'created_at' => '2023-05-17 14:51:39']);
        DB::table($table)->insert(['anio'=>'2014', 'clave' => 'S219', 'nombre' => 'Apoyos para el Desarrollo Forestal Sustentable', 'created_at' => '2023-05-17 14:51:39']);
        DB::table($table)->insert(['anio'=>'2014', 'clave' => 'U036', 'nombre' => 'U036', 'created_at' => '2023-05-17 14:51:39']);
        DB::table($table)->insert(['anio'=>'2019', 'clave' => 'PIC-2019-2024', 'nombre' => 'Programa institucional CONAFOR 2019 - 2024', 'created_at' => '2023-05-17 14:51:39']);
        DB::table($table)->insert(['anio'=>'2020', 'clave' => 'PIC-2019-2024', 'nombre' => 'Programa institucional CONAFOR 2019 - 2024', 'created_at' => '2023-05-17 14:51:39']);
        DB::table($table)->insert(['anio'=>'2021', 'clave' => 'PIC-2020-2024', 'nombre' => 'Programa institucional CONAFOR 2020 - 2024', 'created_at' => '2023-05-17 14:51:39']);
        DB::table($table)->insert(['anio'=>'2023', 'clave' => 'FID', 'nombre' => 'Fichas de Indicacores del Desempeño', 'created_at' => '2023-05-17 14:51:39']);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }
}
