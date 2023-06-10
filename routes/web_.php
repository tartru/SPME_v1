<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Pat\PatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//Account
    Route::get('ingresar', [App\Http\Controllers\AuthenticationController::class, 'auth_login'])->name('ingresar');
    Route::post('login', [App\Http\Controllers\AuthenticationController::class,'authenticate'])->name('login'); //'App\Http\Controllers\AuthenticationController@authenticate')->name('login');
//Account



//General
    Route::get('/', function () {
        return view('general.home', ['menu_active' => 'home']);
    })->name('home');
//General



//Admin
    Route::get('admin', function () {
        return view('admin.index', ['menu_active' => 'admin_index', 'breadcrumb' => ['Administrar' => '']]);
    })->name('admin_index');

    //Estatus
        //Route::get('admin/estatus', [App\Http\Controllers\Admin\CatEstatusController::class, 'index'])->name('admin_estatus');
        Route::get('Cat/estatus', [App\Http\Controllers\Cat\CatEstatusController::class, 'index'])->name('admin_estatus');
    //Estatus

    //Acciones
        //Route::get('admin/acciones', [App\Http\Controllers\Admin\CatAccionesController::class, 'index'])->name('admin_acciones');
        Route::get('Cat/acciones', [App\Http\Controllers\Cat\CatAccionesController::class, 'index'])->name('admin_acciones');
    //Acciones

    //Tipos de captura
        //Route::get('admin/tipos_de_captura', [App\Http\Controllers\Admin\CatTipoCapturaController::class, 'index'])->name('admin_tipos_capturas');
        Route::get('Cat/tipos_de_captura', [App\Http\Controllers\Cat\CatTipoCapturasController::class, 'index'])->name('admin_tipo_capturas');
    //Tipos de captura

    //Frecuencias de medición
        Route::get('admin/frecuencias_de_medicion', [App\Http\Controllers\Admin\CatFrecuenciasMedicionController::class, 'index'])->name('admin_frecuencias_mediciones');
        //Route::get('Cat/frecuencias_de_mediciones', [App\Http\Controllers\Cat\CatFrecuenciasMedicionController::class, 'index'])->name('admin_frecuencias_mediciones');
    //Frecuencias de medición

    //Orígenes presupuestales
    //Route::get('admin/origenes_presupuestales', [App\Http\Controllers\Admin\CatOrigenesPresupuestalesController::class, 'index'])->name('admin_origenes_presupuestales');
    Route::get('Cat/origenes_presupuestales', [App\Http\Controllers\Cat\CatOrigenesPresupuestalesController::class, 'index'])->name('admin_origenes_presupuestales');
    //Orígenes presupuestales

    //Regiones OK
    //Route::get('admin/regiones', [App\Http\Controllers\Admin\CatRegionesController::class, 'index'])->name('admin_regiones');
    Route::get('Cat/regiones', [App\Http\Controllers\Cat\CatRegionesController::class, 'agrupado'])->name('admin_regiones');
    //Regiones

    //Entidades federativas OK
        //Route::get('admin/entidades_federativas', [App\Http\Controllers\Admin\CatEntidadesFederativasController::class, 'index'])->name('admin_entidades_federativas');
        Route::get('Cat/entidades_federativas', [App\Http\Controllers\Cat\CatEntidadesFederativasController::class, 'agrupado'])->name('admin_entidades_federativas');
        Route::get('admin/entidades_federativas/region/{cat_region_id}', [App\Http\Controllers\Admin\CatEntidadesFederativasController::class, 'index'])->name('admin_entidades_federativas_by_region_id'); //VERIFICAR LIGA
    //Entidades federativas

    //Municipios OK
        //Route::get('admin/municipios', [App\Http\Controllers\Admin\CatMunicipiosController::class, 'index'])->name('admin_municipios');
        Route::get('Cat/municipios', [App\Http\Controllers\Cat\CatMunicipiosController::class, 'agrupado'])->name('admin_municipios');
        Route::get('admin/municipios/entidad/{cat_entidad_federativa_id}', [App\Http\Controllers\Admin\CatMunicipiosController::class, 'index'])->name('admin_municipios_by_entidad_federativa_id'); //VERIFICAR LIGA
    //Municipios

    // Grupos de captura
        Route::get('Cat/grupos_captura', [App\Http\Controllers\Cat\CatGruposCapturasController::class, 'index'])->name('admin_grupos_captura');
     // Grupos de captura

      // Programas Presupuestales
      Route::get('Cat/Programas_Presupuestales', [App\Http\Controllers\Cat\CatProgramasPresupuestalesController::class, 'index'])->name('admin_Programas_Presupuestales');
      // Programas Presupuestales

//Admin

        //PAT
            Route::get('Pat/Planea-Pat', [App\Http\Controllers\Pat\PatController::class, 'estados'])->name('Planea-Pat');
        //PAT

        //MIR
        Route::get('Mir/Planea-Mir', [App\Http\Controllers\Mir\MirController::class, 'index'])->name('Planea-Mir');
        //MIR

        //METAS
        Route::get('Metas/Planea-Metas', [App\Http\Controllers\Metas\MetasController::class, 'index'])->name('Planea-Metas');
        //METAS

        //PIC
        Route::get('Pic/Planea-Pic', [App\Http\Controllers\Pic\PicController::class, 'index'])->name('Planea-Pic');
        //PIC
