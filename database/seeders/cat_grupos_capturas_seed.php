<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_grupos_capturas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'cat_grupos_capturas';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");

        DB::table($table)->insert(['id' => 1, 'nombre' => 'GERENCIA ESTATAL AGUASCALIENTES', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 2, 'nombre' => 'GERENCIA ESTATAL BAJA CALIFORNIA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 3, 'nombre' => 'GERENCIA ESTATAL BAJA CALIFORNIA SUR', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 4, 'nombre' => 'GERENCIA ESTATAL CAMPECHE', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 5, 'nombre' => 'GERENCIA ESTATAL COAHUILA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 6, 'nombre' => 'GERENCIA ESTATAL COLIMA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 7, 'nombre' => 'GERENCIA ESTATAL CHIAPAS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 8, 'nombre' => 'GERENCIA ESTATAL CHIHUAHUA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 9, 'nombre' => 'GERENCIA CIUDAD DE MÉXICO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 10, 'nombre' => 'GERENCIA ESTATAL DURANGO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 11, 'nombre' => 'GERENCIA ESTATAL GUANAJUATO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 12, 'nombre' => 'GERENCIA ESTATAL GUERRERO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 13, 'nombre' => 'GERENCIA ESTATAL HIDALGO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 14, 'nombre' => 'GERENCIA ESTATAL JALISCO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 15, 'nombre' => 'GERENCIA ESTATAL MÉXICO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 16, 'nombre' => 'GERENCIA ESTATAL MICHOACÁN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 17, 'nombre' => 'GERENCIA ESTATAL MORELOS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 18, 'nombre' => 'GERENCIA ESTATAL NAYARIT', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 19, 'nombre' => 'GERENCIA ESTATAL NUEVO LEÓN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 20, 'nombre' => 'GERENCIA ESTATAL OAXACA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 21, 'nombre' => 'GERENCIA ESTATAL PUEBLA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 22, 'nombre' => 'GERENCIA ESTATAL QUERÉTARO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 23, 'nombre' => 'GERENCIA ESTATAL QUINTANA ROO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 24, 'nombre' => 'GERENCIA ESTATAL SAN LUIS POTOSÍ', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 25, 'nombre' => 'GERENCIA ESTATAL SINALOA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 26, 'nombre' => 'GERENCIA ESTATAL SONORA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 27, 'nombre' => 'GERENCIA ESTATAL TABASCO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 28, 'nombre' => 'GERENCIA ESTATAL TAMAULIPAS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 29, 'nombre' => 'GERENCIA ESTATAL TLAXCALA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 30, 'nombre' => 'GERENCIA ESTATAL VERACRUZ', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 31, 'nombre' => 'GERENCIA ESTATAL YUCATÁN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 32, 'nombre' => 'GERENCIA ESTATAL ZACATECAS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 33, 'nombre' => 'CEFOFOR JALISCO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 34, 'nombre' => 'CECFOR MICHOACÁN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 35, 'nombre' => 'CECFOR OAXACA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 36, 'nombre' => 'CECFOR COAHUILA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 37, 'nombre' => 'DIRECCIÓN GENERAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 38, 'nombre' => 'COORDINACIÓN GENERAL DE GERENCIAS ESTATALES', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 39, 'nombre' => 'GERENCIA DE COORDINACIÓN Y CONCERTACIÓN', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 40, 'nombre' => 'GERENCIA TÉCNICA', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 41, 'nombre' => 'GERENCIA DE CONTROL OPERATIVO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 42, 'nombre' => 'GERENCIA DE SILVICULTURA COMUNITARIA', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 43, 'nombre' => 'GERENCIA DE SERVICIOS AMBIENTALES DEL BOSQUE', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 44, 'nombre' => 'GERENCIA DE DESARROLLO FORESTAL', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 45, 'nombre' => 'GERENCIA DE INTEGRACIÓN DE LAS CADENAS PRODUCTIVAS', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 46, 'nombre' => 'GERENCIA DE DESARROLLO DE PLANTACIONES FORESTALES COMERCIALES', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 47, 'nombre' => 'COORDINACIÓN GENERAL DE PRODUCCIÓN Y PRODUCTIVIDAD', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 48, 'nombre' => 'GERENCIA DE PROYECTOS Y MERCADOS FORESTALES DE CARBONO', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 49, 'nombre' => 'COORDINACIÓN GENERAL DE CONSERVACIÓN Y RESTAURACIÓN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 50, 'nombre' => 'GERENCIA DE REFORESTACIÓN', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 51, 'nombre' => 'GERENCIA DE SANIDAD', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 52, 'nombre' => 'GERENCIA DE SUELOS', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 53, 'nombre' => 'GERENCIA DE MANEJO DEL FUEGO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 54, 'nombre' => 'COORDINACIÓN GENERAL DE ADMINISTRACIÓN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 55, 'nombre' => 'GERENCIA DE RECURSOS FINANCIEROS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 56, 'nombre' => 'GERENCIA DE RECURSOS HUMANOS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 57, 'nombre' => 'GERENCIA DE RECURSOS MATERIALES Y OBRAS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 58, 'nombre' => 'COORDINACIÓN GENERAL DE PLANEACIÓN E INFORMACIÓN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 59, 'nombre' => 'GERENCIA DE INVENTARIO FORESTAL Y GEOMATICA', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 60, 'nombre' => 'GERENCIA DE INFORMÁTICA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 61, 'nombre' => 'GERENCIA DE PLANEACIÓN Y EVALUACIÓN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 62, 'nombre' => 'GERENCIA DE INFORMACIÓN FORESTAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 63, 'nombre' => 'COORDINACIÓN GENERAL DE EDUCACIÓN Y DESARROLLO TECNOLÓGICO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 64, 'nombre' => 'GERENCIA DE DESARROLLO Y TRANSFERENCIA DE TECNOLOGÍA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 65, 'nombre' => 'GERENCIA DE EDUCACIÓN Y CAPACITACIÓN', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 66, 'nombre' => 'GERENCIA DE CULTURA FORESTAL', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 67, 'nombre' => 'UNIDAD DE ASUNTOS JURÍDICOS', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 68, 'nombre' => 'UNIDAD DE ASUNTOS INTERNACIONALES Y FOMENTO FINANCIERO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 69, 'nombre' => 'UNIDAD DE COMUNICACIÓN SOCIAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 70, 'nombre' => 'ÓRGANO INTERNO DE CONTROL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 71, 'nombre' => 'ÁREA DE PROYECTOS Y MERCADOS FORESTALES DE CARBONO', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 72, 'nombre' => 'SUBGERENCIA DE GERMOPLASMA', 'active' => 0,'created_at' => now()]);
        DB::table($table)->insert(['id' => 73, 'nombre' => 'GERENCIA TÉCNICA Y DE PARTICIPACIÓN SOCIAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 74, 'nombre' => 'GERENCIA DE FOMENTO A LA PRODUCCIÓN FORESTAL SUSTENTABLE', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 75, 'nombre' => 'GERENCIA DE RESTAURACIÓN FORESTAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 76, 'nombre' => 'GERENCIA DE SISTEMA NACIONAL DE MONITOREO FORESTAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 77, 'nombre' => 'GERENCIA DE EDUCACIÓN, CAPACITACIÓN Y CULTURA FORESTAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 78, 'nombre' => 'COORDINACIÓN GENERAL JURÍDICA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 79, 'nombre' => 'DIRECCIÓN DE NORMATIVIDAD Y CONSULTA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 80, 'nombre' => 'DIRECCIÓN DE LO CONTENCIOSOS, ADMINISTRATIVO Y JUDICIAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 81, 'nombre' => 'DIRECCIÓN DE COOPERACIÓN INTERNACIONAL Y ACUERDOS MULTILATERALES', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 82, 'nombre' => 'DIRECCIÓN DE COMUNICACIÓN Y PRODUCCIÓN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 83, 'nombre' => 'GERENCIA DE MANEJO FORESTAL COMUNITARIO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 84, 'nombre' => 'GERENCIA DE MERCADOS, ABASTO E INDUSTRIA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 85, 'nombre' => 'UNIDAD DE OPERACIÓN REGIONAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 86, 'nombre' => 'BOSQUES Y CAMBIO CLIMÁTICO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 87, 'nombre' => 'DIRECCIÓN DE FINANCIAMIENTO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 88, 'nombre' => 'GERENCIA DE ABASTO, TRANSFORMACIÓN Y MERCADOS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 89, 'nombre' => 'COORDINACION DE APOYO Y PROYECTOS ESPECIALES', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 90, 'nombre' => 'GERENCIA DE COMUNICACION Y PRODUCCION', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 91, 'nombre' => 'UNIDAD DE VINCULACION SECTORIAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 92, 'nombre' => 'UNIDAD DE EDUCACION Y DESARROLLO TECNOLOGICO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 93, 'nombre' => 'GERENCIA DE PLANTACIONES FORESTALES COMERCIALES', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 94, 'nombre' => 'GERENCIA DE BOSQUES Y CAMBIO CLIMATICO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 95, 'nombre' => 'GERENCIA DE COOPERACION INTERNACIONAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 96, 'nombre' => 'GERENCIA DE FINANCIAMIENTO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 97, 'nombre' => 'GERENCIA DE REFORESTACIÓN Y RESTAURACIÓN DE CUENCAS HIDROGRÁFICAS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 98, 'nombre' => 'GERENCIA DE SERVICIOS AMBIENTALES DEL BOSQUE Y CONSERVACION DE LA BIODIVERSIDAD', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 99, 'nombre' => 'GERENCIA DE LO CONTENCIOSO, ADMINISTRATIVO Y JUDICIAL', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 100, 'nombre' => 'GERENCIA DE NORMATIVIDAD Y CONSULTA', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 101, 'nombre' => 'UNIDAD DE ADMINISTRACION Y FINANZAS', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 102, 'nombre' => 'GERENCIA DE PROGRAMACION Y PRESUPUESTO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 103, 'nombre' => 'GERENCIA DE TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 104, 'nombre' => 'GERENCIA DE RECURSOS MATERIALES', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 105, 'nombre' => 'GERENCIA DE PROGRAMACIÓN Y PRESUPUESTO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 106, 'nombre' => 'GERENCIA TÉCNICA DEL SISTEMA DE MONITOREO, REPORTE Y VERIFICACIÓN', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 107, 'nombre' => 'GERENCIA DE SISTEMA NACIONAL DE MONITOREO FORESTAL Y GERENCIA TÉCNICA DEL SISTEMA DE MONITOREO, REPO', 'active' => 1,'created_at' => now()]);
        DB::table($table)->insert(['id' => 109, 'nombre' => 'UNIDAD DE VINCULACIÓN Y GÉNERO', 'active' => 1,'created_at' => now()]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
