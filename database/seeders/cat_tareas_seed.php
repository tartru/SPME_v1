<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class asm_tareas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'cat_tareas';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");

        DB::table($table)
        ->insert(['pos' => 1,'ant' => null,'sig' => null,'nombre' =>  'Rechazado','descripcion' =>  'Registro  Rechazado','active' =>1])
        ->insert(['pos' => 2,'ant' => null,'sig' => null,'nombre' =>  'Cancelado','descripcion' =>  'Registro Cancelado','active' =>1])
        ->insert(['pos' => 3,'ant' => null,'sig' => null,'nombre' =>  'Libre','descripcion' =>  'Estatus Libre','active' =>0])
        ->insert(['pos' => 4,'ant' => null,'sig' => null,'nombre' =>  'Libre','descripcion' =>  'Estatus Libre','active' =>0])
        ->insert(['pos' => 5,'ant' => null,'sig' => null,'nombre' =>  'Libre','descripcion' =>  'Estatus Libre','active' =>0])

        ->insert(['pos' => 10,'ant' => null,'sig' => 11,'nombre' =>  'Captura Ficha','descripcion' =>  'Registro en captura','active' =>1])
        ->insert(['pos' => 11,'ant' => 10,'sig' => 12,'nombre' =>  'Revisa Ficha','descripcion' =>  'Registro en el proceso de revisión','active' =>1])
        ->insert(['pos' => 12,'ant' => 11,'sig' => 13,'nombre' =>  'Aprueba Ficha','descripcion' =>  'Registro ha sido rechazado','active' =>1])
        ->insert(['pos' => 13,'ant' => 12,'sig' => 14,'nombre' =>  'Ficha en proceso','descripcion' =>  'Registro en proceso','active' =>1])
        ->insert(['pos' => 14,'ant' => 13,'sig' => null,'nombre' =>  'Ficha Finalizada','descripcion' =>  'Terminado','active' =>1])

        ->insert(['pos' => 20,'ant' => null,'sig' => 21,'nombre' =>  'Captura Recomendaciones','descripcion' =>  'Registro ha sido rechazado','active' =>1])
        ->insert(['pos' => 21,'ant' => 20,'sig' => 22,'nombre' =>  'Revisa Recomendaciones','descripcion' =>  'Registro ha sido aceptado','active' =>1])
        ->insert(['pos' => 22,'ant' => 21,'sig' => 23,'nombre' =>  'Aprueba Recomendaciones','descripcion' =>  'En espera de aprobación','active' =>1])
        ->insert(['pos' => 23,'ant' => 22,'sig' => 24,'nombre' =>  'Recomendacion en proceso','descripcion' =>  'En proceso','active' =>1])
        ->insert(['pos' => 24,'ant' => 23,'sig' => null,'nombre' =>  'Recomendacion Finalizada','descripcion' =>  'En proceso','active' =>1])

        ->insert(['pos' => 30,'ant' => null,'sig' => 31,'nombre' =>  'Captura ASM','descripcion' =>  'Registro ha sido rechazado','active' =>1])
        ->insert(['pos' => 31,'ant' => 30,'sig' => 32,'nombre' =>  'Revisa ASM','descripcion' =>  'Registro ha sido aceptado','active' =>1])
        ->insert(['pos' => 32,'ant' => 31,'sig' => 33,'nombre' =>  'Aprueba ASM','descripcion' =>  'En espera de aprobación','active' =>1])
        ->insert(['pos' => 33,'ant' => 32,'sig' => 34,'nombre' =>  'ASM en proceso','descripcion' =>  'En proceso','active' =>1])
        ->insert(['pos' => 34,'ant' => 33,'sig' => null,'nombre' =>  'ASM Finalizado','descripcion' =>  'Terminado','active' =>1]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
