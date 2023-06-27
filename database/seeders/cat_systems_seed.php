<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_systems_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('cat_systems')->insert(['id'=>1,'siglas' =>  'SPME','nombre' =>  'Sistema de Planeación Monitoreo y Evaluación','descripcion' =>  '<h2>SPME</h2>
        <p>SYSTEM</p>','active' => 1,'deleted' =>0,'created_at' =>  '2023-05-17 14:51:39','updated_at' =>  '2023-05-17 14:51:39','active_at' =>  '','deleted_at' =>  '']);
        DB::table('cat_systems')->insert(['id'=>2,'siglas' =>  'ASM','nombre' =>  'Aspectos Susceptibles de Mejora','descripcion' =>  '<h2>ASM</h2>
        <p>Los Aspectos Susceptibles de Mejora (ASM) son hallazgos, debilidades, oportunidades y amenazas que derivan de las evaluaciones externas y se presentan como recomendaciones específicas a los diferentes programas y acciones federales.</p>','active' => 1,'deleted' =>0,'created_at' =>  '2023-05-17 14:51:39','updated_at' =>  '2023-05-17 14:51:39','active_at' =>  '','deleted_at' =>  '']);
        DB::table('cat_systems')->insert(['id'=>3,'siglas' =>  'PAT','nombre' =>  'Programa Anual de Trabajo','descripcion' =>  '<h2>PAT</h2>
        <p>Para concretar las estrategias y acciones puntuales del PIC 2020-2024 y del PNF 2020- 2024, la CONAFOR integra de manera anual un instrumento de planeaci&oacute;n de nivel operativo, denominado Programa Anual de Trabajo (PAT), en el que se establece de manera espec&iacute;fica la intervenci&oacute;n de la instituci&oacute;n para el ejercicio fiscal correspondiente a trav&eacute;s de objetivos, estrategias y acciones puntuales que habr&aacute;n de instrumentarse, las metas anuales programadas con el presupuesto asignado, las actividades estrat&eacute;gicas que se ejecutar&aacute;n, as&iacute; como los responsables de dar cumplimiento a los planteamientos establecidos. Todo ello bajo el principio de eficiencia y eficacia en t&eacute;rminos del uso y destino de los recursos p&uacute;blicos y en cumplimiento de los objetivos y metas sexenales establecidas en indicadores del PIC 2020-2024. El PAT 2022 de la CONAFOR, contiene las acciones relevantes que se desarrollar&aacute;n en el ejercicio fiscal, los indicadores y metas con los que se podr&aacute; monitorear y medir su cumplimiento, as&iacute; como las actividades espec&iacute;ficas que se desarrollar&aacute;n para el cumplimiento de las metas anuales que contribuyen a las metas sexenales planteadas en cada uno de los indicadores del PIC 2020-2024.</p>','active' => 1,'deleted' =>0,'created_at' =>  '2023-05-17 14:51:39','updated_at' =>  '2023-05-17 14:51:39','active_at' =>  '','deleted_at' =>  '']);
        DB::table('cat_systems')->insert(['id'=>4,'siglas' =>  'MIR','nombre' =>  'Matriz de Indicadores para Resultados','descripcion' =>  '<h2MIR</h2>
        <p>&nbsp;</p>
        <p class="ms-rteElement-Parrafo">La&nbsp;<a href="https://www.coneval.org.mx/coordinacion/Paginas/monitoreo/metodologia/mml.aspx">Matriz de Indicadores para Resultados</a>&nbsp;(MIR) es una herramienta de planeaci&oacute;n que identifica en forma resumida los objetivos de un programa, incorpora los indicadores de resultados y gesti&oacute;n que miden dichos objetivos; especifica los medios para obtener y verificar la informaci&oacute;n de los indicadores, e incluye los riesgos y contingencias que pueden afectar el desempe&ntilde;o del programa.</p>
        <p class="ms-rteElement-Parrafo">De acuerdo con los&nbsp;<a class="rspkr_dr_added dynamic menu-item ms-core-listMenu-item ms-displayInline ms-navedit-linkNode" href="https://www.coneval.org.mx/rw/resource/coneval/eval_mon/1768.pdf" target="_blank">Lineamientos Generales para la Evaluaci&oacute;n de los Programas Federales de la Administraci&oacute;n P&uacute;blica Federal</a><a class="rspkr_dr_link" href="https://docreader.readspeaker.com/docreader/?cid=bzyxi&amp;lang=es_mx&amp;url=https%3A%2F%2Fwww.coneval.org.mx%2Frw%2Fresource%2Fconeval%2Feval_mon%2F1768.pdf" target="_blank"><img class="rspkr_dr_img" title="Abrir este documento utilizando el ReadSpeaker docReader" src="https://media.readspeaker.com/images/buttons/listen_icons/icon_16px.gif" alt="Abrir este documento utilizando el ReadSpeaker docReader" /></a>, todos los programas presupuestarios est&aacute;n obligados a tener una MIR. A fin de contribuir a la transparencia y la rendici&oacute;n de cuentas, el CONEVAL pone a disposici&oacute;n para su consulta las MIR de los programas y acciones de desarrollo social desde 2008.</p>
        <p class="ms-rteElement-Parrafo">La informaci&oacute;n referente al contenido de las MIR es responsabilidad de cada programa por lo que para cualquier informaci&oacute;n adicional, se sugiere solicitarla directamente a la dependencia o programa responsable.</p>','active' => 1,'deleted' =>0,'created_at' =>  '2023-05-17 14:51:39','updated_at' =>  '2023-05-17 14:51:39','active_at' =>  '','deleted_at' =>  '']);
        DB::table('cat_systems')->insert(['id'=>5,'siglas' =>  'M.E','nombre' =>  'Metas Estrategicas','descripcion' =>  '<h2>M.E.</h2>
        <p>En tal virtud, el Programa Nacional Forestal 2020-2024 contribuir&aacute; a cumplir los compromisos internacionales en materia forestal que M&eacute;xico ha adquirido al adherirse a una serie de acuerdos multilaterales. Entre estos acuerdos se encuentran: la Convenci&oacute;n de las Naciones Unidas de Lucha contra la Desertificaci&oacute;n; el Convenio Internacional de las Maderas Tropicales; la Convenci&oacute;n Marco de las Naciones Unidas sobre el Cambio Clim&aacute;tico (CMNUCC); el Acuerdo de Par&iacute;s; la Convenci&oacute;n sobre el Comercio Internacional de Especies Amenazadas de Fauna y Flora Silvestres; el Convenio sobre la Diversidad Biol&oacute;gica (CDB) y las Metas de Aichi, y la Agenda 2030 y sus Objetivos de Desarrollo Sostenible (ODS). Adicionalmente, existen iniciativas internacionales a las que el Gobierno de M&eacute;xico se ha adherido como el Desaf&iacute;o de Bonn (Bonn Challenge) y la Declaraci&oacute;n de Nueva York sobre los Bosques.</p>','active' => 1,'deleted' =>0,'created_at' =>  '2023-05-17 14:51:39','updated_at' =>  '2023-05-17 14:51:39','active_at' =>  '','deleted_at' =>  '']);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }
}
