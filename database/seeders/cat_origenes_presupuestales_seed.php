<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_origenes_presupuestales_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Presupuesto de Egresos de la Federación','descripcion' => '','position' => 1,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Fondo CONAFOR-CONACYT','descripcion' => '','position' => 14,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Aportaciones de Gobiernos Estatales','descripcion' => '','position' => 11,'nota' =>'Con aportaciones del gobierno del estado se apoyaron {avance} {unidad de medida}','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Aportaciones de los propios beneficiarios','descripcion' => '','position' => 7,'nota' =>'Con recursos de los propios dueños y poseedores de los terrenos forestales se realizaron acciones de tratamiento fitosanitario en {avance} {unidad de medida}','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Contrapartes de Fondos Concurrentes','descripcion' => '','position' => 4,'nota' =>'Adicionalmente con recursos provenientes del Fondo Forestal Mexicano se apoyaron {avance} {unidad de medida}','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Organismos Internacionales','descripcion' => '','position' => 17,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Banco Mundial','descripcion' => '','position' => 16,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Organismos No Gubernamentales','descripcion' => '','position' => 20,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Aportaciones de Municipios','descripcion' => '','position' => 13,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Organización de las Naciones Unidas para la Alimentación y la Agricultura','descripcion' => '','position' => 18,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Programa de las Naciones Unidas para el Desarrollo','descripcion' => '','position' => 19,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Fideicomisos Instituidos en Relación con la Agricultura','descripcion' => '','position' => 21,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Secretaría de la Defensa Nacional','descripcion' => '','position' => 12,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Programa de Empleo Temporal','descripcion' => '','position' => 9,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Comisión Nacional de Áreas Naturales Protegidas','descripcion' => '','position' => 22,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Secretaría de Marina','descripcion' => '','position' => 15,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Voluntarios','descripcion' => '','position' => 10,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Servicios Externos','descripcion' => '','position' => 23,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Asociaciones Regionales de Silvicultores','descripcion' => '','position' => 24,'nota' =>'','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Intereses Fondo Forestal Mexicano','descripcion' => '','position' => 3,'nota' =>'Adicionalmente con recursos provenientes del Fondo Forestal Mexicano se apoyaron {avance} {unidad de medida}','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Avances con recursos asignados en años anteriores','descripcion' => '','position' => 2,'nota' =>'En seguimiento a proyectos con recursos asignados en años anteriores se realizaron acciones en {avance} {unidad de medida}','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Otras instancias (Especificar en notas)','descripcion' => '','position' => 8,'nota' =>'Adicionalmente con recursos de otras instancias se realizaron {avance} {unidad de medida}','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Brigadas de Sanidad Forestal año actual','descripcion' => '','position' => 5,'nota' =>'Con recursos asignados a las brigadas de sanidad forestal en el {año actual} se realizaron acciones de tratamientos fitosanitarios {avance} {unidad de medida}','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Brigadas de Sanidad Forestal año anterior','descripcion' => '','position' => 6,'nota' =>'Con recursos asignados a las brigadas de sanidad forestal en {año anterior} se realizaron acciones de tratamientos fitosanitarios en {avance} {unidad de medida}','active' => 1]);
        DB::table('cat_origenes_presupuestales')->insert(['nombre' => 'Compensación Ambiental por CUSTF','descripcion' => '','position' => 25,'nota' =>'Adicionalmente con recursos provenientes de Compensación Ambiental por CUSTF se apoyaron {avance} {unidad de medida}','active' => 1]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
