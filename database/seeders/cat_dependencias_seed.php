<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_dependencias_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'cat_dependencias ';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
   
        DB::table($table)->insert(['siglas' => 'AGRICULTURA','nombre'=>'Secretaría de Agricultura y Desarrollo Rural','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'BANOBRAS', 'nombre' => 'Banco Nacional de Obras y Servicios S.N.C.','created_at' =>now()]); 
        DB::table($table)->insert(['siglas' => 'BIENESTAR','nombre'=>'Secretaría de Bienestar','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CENAPRED','nombre'=>'Centro Nacional de Prevención de Desastres','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CNPC','nombre'=>'Coordinación Nacional de Protección Civil','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CONABIO','nombre'=>'Comisión Nacional para el Conocimiento y Uso de la Biodiversidad','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CONACYT','nombre'=>'Consejo Nacional de Ciencia y Tecnología','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CONADE', 'nombre' => 'Comisión Nacional de la Cultura Física y el Deporte','created_at' =>now()]); 
        DB::table($table)->insert(['siglas' => 'CONAFOR','nombre'=>'Comisión Nacional Forestal','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CONAGUA','nombre'=>'Comisión Nacional del Agua','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CONANP','nombre'=>'Comisión Nacional de Áreas Naturales Protegidas','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CONAP','nombre'=>'Consejo Nacional de Áreas Protegidas','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CONAVI', 'nombre' => 'Comisión Nacional de Vivienda','created_at' =>now()]); 
        DB::table($table)->insert(['siglas' => 'CONAZA','nombre'=>'Comisión Nacional de Zonas Áridas','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'CULTURA', 'nombre' => 'Secretaría de Cultura','created_at' =>now()]); 
        DB::table($table)->insert(['siglas' => 'Demarcaciones CDMX','nombre'=>'Demarcaciones territoriales de la Ciudad de México','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'DIF', 'nombre' => 'Sistema Nacional para el Desarrollo Integral de la Familia','created_at' =>now()]); 
        DB::table($table)->insert(['siglas' => 'ECONOMIA', 'nombre' => 'Secretaría de Economía','created_at' =>now()]);   
        DB::table($table)->insert(['siglas' => 'FGR','nombre'=>'Fiscalía General de la República','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'FIRA','nombre'=>'Fideicomisos Instituidos en Relación con la Agricultura','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'Gob. entidades federativas','nombre'=>'Gobiernos de los estados','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'Gob. Municipales','nombre'=>'Municipios','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'IMJUVE','nombre'=>'Instituto Mexicano de la Juventud','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'IMTA','nombre'=>'Instituto Mexicano de Tecnología del Agua','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'INECC','nombre'=>'INECC','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'INIFAP','nombre'=>'INIFAP','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'INMUJERES','nombre'=>'Instituto Nacional de las Mujeres','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'INPI','nombre'=>'Instituto Nacional de los Pueblos Indígenas','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'PA','nombre'=>'Procuraduría Agraria','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'PROFEPA','nombre'=>'PROFEPA','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SADER','nombre'=>'Secretaría de Desarrollo Rural y Agrario','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SALUD','nombre'=>'Secretaría de Salud','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SAT','nombre'=>'Servicio de Administración Tributaria','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SCT','nombre'=>'Secretaría de Comunicaciones y Transportes','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SECTUR','nombre'=>'SECTUR','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SEDATU','nombre'=>'Secretaría de Desarrollo Agrario, Territorial y Urbano','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SEDENA','nombre'=>'Secretaría de la Defensa Nacional','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SEGOB','nombre'=>'Secretaría de Gobernación','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SEMAR','nombre'=>'Secretaría de Marina','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SEMARNAT','nombre'=>'Secretaría de Medio Ambiente y Recursos Naturales','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SENASICA','nombre'=>'Servicio Nacional de Sanidad, Inocuidad y Calidad Agroalimentaria','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SENER','nombre'=>'Secretaría de Energía','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SEP','nombre'=>'Secretaría de Educación Publica','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SETUR','nombre'=>'Secretaría de Turismo','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SFP','nombre'=>'Secretaría de la Función Pública','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SHCP','nombre'=>'Secretaría de Hacienda y Crédito Público','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SIAP','nombre'=>'Servicio de Información Agroalimentaria y Pesquera','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SRE','nombre'=>'Secretría de Relaciones Exteriores','created_at' =>now()]);
        DB::table($table)->insert(['siglas' => 'SSPC','nombre'=>'Secretaría de Seguridad y Protección Ciudadana','created_at' =>now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
