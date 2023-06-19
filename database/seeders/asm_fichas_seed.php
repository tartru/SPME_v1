<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class asm_fichas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('asm_fichas')->insert(['nombre' => 'FMyE 2021-2022','descripcion' => 'Ficha de Apoyos para el Desarrollo Forestal Sustentable','comentario_general' => 'La Ficha de Monitoreo y Evaluación 2021-2022 del Programa presupuestario (Pp) E014 – Protección Forestal (FMyE 2021-2022) se considera un elemento clave para la valoración de las acciones que se realizan antes y durante la operación del programa, así como de la efectividad de los documentos que lo rigen; puesto que a pesar de ser un instrumento que muestra de manera sintetizada la operatividad del programa, da pauta para el análisis general del mismo, desde la pertinencia de los principales indicadores hasta la identificación de posibles acciones de mejora en los procesos que le competen, lo que se traduce en una mejora gradual del programa con elementos que orientan la toma de decisiones.\r\nComo se muestra en la ficha de monitoreo, esta refleja únicamente el avance en los resultados de los indicadores a nivel fin y propósito de la Matriz de Indicadores para Resultados del programa, lo que permite tener un panorama limitado de su operación.\r\nRespecto al proceso de evaluación, este se considera pertinente dado a que la Unidad de Evaluación de la CONAFOR involucró a las áreas operativas del programa en la validación de los datos expuestos en el apartado de Monitoreo, así como, en la integración y análisis de los elementos incluidos en la matriz FODA (Fortalezas, oportunidades, debilidades y amenazas) correspondiente a ficha de evaluación. Finalmente, la CONAFOR reconoce la participación de la Secretaría de Medio Ambiente y Recursos Naturales (SEMARNAT) y del Consejo Nacional de Evaluación de la Política de Desarrollo Social (CONEVAL) como piezas clave en el proceso de elaboración de la FMyE 2021-2022, ya que brindaron la orientación adecuada y oportuna para la integración de dicho documento.\r\n','comentario_especifico' => 'La Ficha de Monitoreo y Evaluación permite a las áreas involucradas identificar áreas de mejora que deriven en la propuesta de acciones puntuales que respondan a las necesidades del programa y contribuyan al el fortalecimiento de la operación y alcances del mismo. \r\nDada la relevancia de los hallazgos identificados, la CONAFOR promueve, que a partir del análisis de los resultados derivados del análisis  FODA, se diseñen mecanismos para optimización de las fortalezas identificadas y minimizar las debilidades que se pudieran presentar en torno a las mismas, así como para la orientación de esfuerzos y el logro de acciones conjuntas que permitan la optimización de resultados del programa presupuestario.\r\nLa evaluación brinda elementos de análisis que conllevan a la definición de acciones para contribuir a la mejora gradual del programa, desde la planeación del mismo hasta su operatividad, de esta manera, se busca la optimización de los procesos y resultados logrados a través de su ejecución. \r\n','cat_programas_presupuestale_id' => 2,'cat_programas_presupuestale_id' => 13,'fecha_inicial' => now(),'created_at' => now()]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
