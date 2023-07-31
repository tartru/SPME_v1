<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_estatus_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'cat_estatus';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");

        DB::table($table)->insert(['valor' => 1,'nombre' =>  'Capturando','descripcion' =>  'El registro se encuentra en captura','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['valor' => 2,'nombre' =>  'Editando','descripcion' =>  'El registro se encuentra en el proceso de revisión','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['valor' => 3,'nombre' =>  'Rechazado','descripcion' =>  'El registro ha sido rechazado','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['valor' => 4,'nombre' =>  'Aprobado','descripcion' =>  'El registro ha sido aceptado','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['valor' => 5,'nombre' =>  'Terminado','descripcion' =>  'El registro ha sido aceptado','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['valor' => 6,'nombre' =>  'Cancelado','descripcion' =>  'El registro ha sido aceptado','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }
}
