<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_entidades_federativas_seed extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = 'cat_entidades_federativas';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");

        DB::table($table)->insert(['id' => 1, 'cve_entidad' => '01','nombre' =>'Aguascalientes','abreviacion' => 'AGS','cat_regione_id' => 5,'created_at' => now()]);
        DB::table($table)->insert(['id' => 2, 'cve_entidad' => '02','nombre' => 'Baja California','abreviacion' =>'BCN','cat_regione_id' =>3,'created_at' => now()]);
        DB::table($table)->insert(['id' => 3, 'cve_entidad' => '03', 'nombre' => 'Baja California Sur','abreviacion' => 'BCS','cat_regione_id' =>3,'created_at' => now()]);
        DB::table($table)->insert(['id' => 4, 'cve_entidad' => '04', 'nombre' => 'Campeche','abreviacion' => 'CAM','cat_regione_id' =>6,'created_at' => now()]);
        DB::table($table)->insert(['id' => 5, 'cve_entidad' => '05', 'nombre' => 'Coahuila de Zaragoza','abreviacion' => 'COA','cat_regione_id' =>2,'created_at' => now()]);
        DB::table($table)->insert(['id' => 6, 'cve_entidad' => '06', 'nombre' => 'Colima','abreviacion' => 'COL','cat_regione_id' =>5,'created_at' => now()]);
        DB::table($table)->insert(['id' => 7, 'cve_entidad' => '07', 'nombre' => 'Chiapas','abreviacion' => 'CHI','cat_regione_id' =>6,'created_at' => now()]);
        DB::table($table)->insert(['id' => 8, 'cve_entidad' => '08', 'nombre' => 'Chihuahua','abreviacion' => 'CHH','cat_regione_id' =>4,'created_at' => now()]); 
        DB::table($table)->insert(['id' => 9, 'cve_entidad' => '09', 'nombre' => 'Ciudad de México','abreviacion' => 'CME','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 10, 'cve_entidad' => '10', 'nombre' => 'Durango','abreviacion' => 'DGO','cat_regione_id' =>4,'created_at' => now()]);
        DB::table($table)->insert(['id' => 11, 'cve_entidad' => '11', 'nombre' => 'Guanajuato','abreviacion' => 'GTO','cat_regione_id' =>5,'created_at' => now()]);
        DB::table($table)->insert(['id' => 12, 'cve_entidad' => '12', 'nombre' => 'Guerrero','abreviacion' => 'GRO','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 13, 'cve_entidad' => '13', 'nombre' => 'Hidalgo','abreviacion' => 'HGO','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 14, 'cve_entidad' => '14', 'nombre' => 'Jalisco','abreviacion' => 'JAL','cat_regione_id' =>5,'created_at' => now()]);
        DB::table($table)->insert(['id' => 15, 'cve_entidad' => '15', 'nombre' => 'México','abreviacion' => 'MEX','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 16, 'cve_entidad' => '16', 'nombre' => 'Michoacán de Ocampo','abreviacion' => 'MCH','cat_regione_id' =>5,'created_at' => now()]);
        DB::table($table)->insert(['id' => 17, 'cve_entidad' => '17', 'nombre' => 'Morelos','abreviacion' => 'MOR','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 18, 'cve_entidad' => '18', 'nombre' => 'Nayarit','abreviacion' => 'NAY','cat_regione_id' =>5,'created_at' => now()]);
        DB::table($table)->insert(['id' => 19, 'cve_entidad' => '19', 'nombre' => 'Nuevo León','abreviacion' => 'NLN','cat_regione_id' =>2,'created_at' => now()]);
        DB::table($table)->insert(['id' => 20, 'cve_entidad' => '20', 'nombre' => 'Oaxaca','abreviacion' => 'OAX','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 21, 'cve_entidad' => '21', 'nombre' => 'Puebla','abreviacion' => 'PUE','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 22, 'cve_entidad' => '22', 'nombre' => 'Querétaro','abreviacion' => 'QRO','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 23, 'cve_entidad' => '23', 'nombre' => 'Quintana Roo','abreviacion' => 'QOO','cat_regione_id' =>6,'created_at' => now()]);
        DB::table($table)->insert(['id' => 24, 'cve_entidad' => '24', 'nombre' => 'San Luis Potosí','abreviacion' => 'SLP','cat_regione_id' =>5,'created_at' => now()]);
        DB::table($table)->insert(['id' => 25, 'cve_entidad' => '25', 'nombre' => 'Sinaloa','abreviacion' => 'SIN','cat_regione_id' =>3,'created_at' => now()]);
        DB::table($table)->insert(['id' => 26, 'cve_entidad' => '26', 'nombre' => 'Sonora','abreviacion' => 'SON','cat_regione_id' =>3,'created_at' => now()]);
        DB::table($table)->insert(['id' => 27, 'cve_entidad' => '27', 'nombre' => 'Tabasco','abreviacion' => 'TAB','cat_regione_id' =>6,'created_at' => now()]);
        DB::table($table)->insert(['id' => 28, 'cve_entidad' => '28', 'nombre' => 'Tamaulipas','abreviacion' => 'TAM','cat_regione_id' =>2,'created_at' => now()]);
        DB::table($table)->insert(['id' => 29, 'cve_entidad' => '29', 'nombre' => 'Tlaxcala','abreviacion' => 'TLX','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 30, 'cve_entidad' => '30', 'nombre' => 'Veracruz de Ignacio de la Llave','abreviacion' => 'VER','cat_regione_id' =>1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 31, 'cve_entidad' => '31', 'nombre' => 'Yucatán','abreviacion' => 'YUC','cat_regione_id' =>6,'created_at' => now()]);
        DB::table($table)->insert(['id' => 32, 'cve_entidad' => '32', 'nombre' => 'Zacatecas','abreviacion' => 'ZAC','cat_regione_id' =>5,'created_at' => now()]);
        DB::table($table)->insert(['id' => 45, 'cve_entidad' => '45', 'nombre' => 'No regionalizado','abreviacion' => 'NRE', 'cat_regione_id' =>0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 46, 'cve_entidad' => '46', 'nombre' => 'Nacional','abreviacion' => 'NAC', 'cat_regione_id' =>0,'created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }

    public function vaciar() {
        DB::table('cat_entidades_federativas')->truncate();
    }
}
