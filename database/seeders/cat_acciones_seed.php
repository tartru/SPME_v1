<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_acciones_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = 'cat_acciones';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
   
        DB::table($table)->insert(['position' =>1,'nombre' => 'Crear','descripcion' => 'Crea el registro','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['position' =>2,'nombre' => 'Editar','descripcion' => 'Edita el registro','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['position' =>3,'nombre' => 'Enviar','descripcion' => 'Envía a revisión','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['position' =>4,'nombre' => 'Rechazar','descripcion' => 'Se rechaza el registro','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['position' =>5,'nombre' => 'Aprobar','descripcion' => 'Se aprueba el registro','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['position' =>6,'nombre' => 'Cambiar estatus','descripcion' => 'Cambia el estatus del registro','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['position' =>7,'nombre' => 'Eliminar','descripcion' => 'Se elimina el registro','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::table($table)->insert(['position' =>8,'nombre' => 'Responder','descripcion' => 'Se respondió el mensaje','active' =>1,'deleted' => 0,'created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }


}
