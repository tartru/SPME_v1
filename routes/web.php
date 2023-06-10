<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

/*
//Account
    Route::get('login', [App\Http\Controllers\AuthenticationController::class,'auth_login'])->name('login');
    Route::post('login', [App\Http\Controllers\AuthenticationController::class,'authenticate'])->name('login'); 
    Route::get('validate',[App\Http\Controllers\AuthenticationController::class,'validate_token'])->name('validate');
    Route::get('logout',[App\Http\Controllers\AuthenticationController::class,'cerrar'])->name('logout');
//Account
*/

//Account
Route::get('login', [App\Http\Controllers\AuthenticationController::class,'auth_login'])->name('login');
Route::post('login', [App\Http\Controllers\AuthenticationController::class,'authenticate'])->name('login'); 
Route::get('validate',[App\Http\Controllers\AuthenticationController::class,'validate_token'])->name('validate');
Route::get('logout',[App\Http\Controllers\AuthenticationController::class,'logout'])->name('logout');
//Account

/*//General
    Route::get('general.home', function () {
        if (null!==(Http::get('general.home')->json("TOKEN")))
        {
        echo Http::get('general.home')->headers();
        }
        else {
            return view('general.home', ['menu_active' => 'home']);
        }
    })->name('validate');
//General
*/

    
    Route::get('/', function () {
        if (session()->has('token')){
                return view('general.home', ['menu_active' => 'home']);
            }
            else{
               return view('account.login')->with('message',"Tu Sesión expiró, Inicia nuevamente");
            }
    })->middleware('auth')->name('home');

    //Route::post('/',[App\Http\Controllers\ValidaController::class, 'validate_token'])->name('validate');
 

//Administracion
    Route::get('admin', function () {
        return view('admin.index', ['menu_active' => 'admin_index', 'breadcrumb' => ['Administrar' => '']]);
    })->name('admin_index');

    //Estatus
         Route::get('Cat/estatus', [App\Http\Controllers\Cat\CatEstatusController::class, 'index'])->middleware('auth')->name('admin_estatus');
    //Estatus

    //Acciones
        Route::get('Cat/acciones', [App\Http\Controllers\Cat\CatAccionesController::class, 'index'])->middleware('auth')->name('admin_acciones');
    //Acciones

    //Tipos de captura
        Route::get('Cat/tipos_de_captura', [App\Http\Controllers\Cat\CatTipoCapturasController::class, 'index'])->middleware('auth')->name('admin_tipo_capturas');
    //Tipos de captura

    //Frecuencias de medición
        Route::get('Cat/frecuencias_de_medicion', [App\Http\Controllers\Cat\CatFrecuenciasMedicionesController::class, 'index'])->middleware('auth')->name('admin_frecuencias_mediciones');
    //Frecuencias de medición

    //Orígenes presupuestales
        Route::get('Cat/origenes_presupuestales', [App\Http\Controllers\Cat\CatOrigenesPresupuestalesController::class, 'index'])->middleware('auth')->name('admin_origenes_presupuestales');
    //Orígenes presupuestales

    //Regiones OK
        Route::get('Cat/regiones', [App\Http\Controllers\Cat\CatRegionesController::class, 'agrupado'])->middleware('auth')->name('admin_regiones');
    //Regiones

    //Entidades federativas OK
        Route::get('Cat/entidades_federativas', [App\Http\Controllers\Cat\CatEntidadesFederativasController::class, 'agrupado'])->middleware('auth')->name('admin_entidades_federativas');
        Route::get('admin/entidades_federativas/region/{cat_region_id}', [App\Http\Controllers\Admin\CatEntidadesFederativasController::class, 'index'])->middleware('auth')->name('admin_entidades_federativas_by_region_id'); //VERIFICAR LIGA
    //Entidades federativas

    //Municipios OK
        Route::get('Cat/municipios', [App\Http\Controllers\Cat\CatMunicipiosController::class, 'agrupado'])->middleware('auth')->name('admin_municipios');
        //Route::get('admin/municipios/entidad/{cat_entidad_federativa_id}', [App\Http\Controllers\Admin\CatMunicipiosController::class, 'index'])->name('admin_municipios_by_entidad_federativa_id'); //VERIFICAR LIGA
        Route::get('Cat/municipios/entidad/{cat_entidad_federativa_id}', [App\Http\Controllers\Cat\CatMunicipiosController::class, 'CatMunicipiId'])->middleware('auth')->name('admin_municipios_by_entidad_federativa_id'); //VERIFICAR LIGA
    //Municipios

    // Grupos de captura
        Route::get('Cat/grupos_captura', [App\Http\Controllers\Cat\CatGruposCapturasController::class, 'index'])->middleware('auth')->name('admin_grupos_captura');
    // Grupos de captura

     // Programas Presupuestales
        Route::get('Cat/programas_presupuestales', [App\Http\Controllers\Cat\CatProgramasPresupuestalesController::class, 'index'])->middleware('auth')->name('admin_programas_presupuestales');
     // Programas Presupuestales

//Administracion

//Configuracion
    // usuarios
        Route::get('usuarios', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth')->name('admin_usuarios');
        Route::get('profile', [App\Http\Controllers\UsersController::class, 'show'])->middleware('auth')->name('admin_profile');
     // usuarios
     // grupos captura
     Route::get('Cat/grupos_capturas', [App\Http\Controllers\GruposCapturasController::class, 'index'])->name('admin_grupos_captura'); //NO CONFIGURADO
     // grupos captura
//Configuracion

//Programa Anual de Trabajo
        //PAT
            Route::get('Pat/Planea-Pat', [App\Http\Controllers\Pat\PatController::class, 'estados'])->name('Planea-Pat');
        //PAT
//Programa Anual de Trabajo

//Indicadores 
        //MIR
        Route::get('Mir/Planea-Mir', [App\Http\Controllers\Mir\MirController::class, 'index'])->name('Planea-Mir');
        //MIR
//Indicadores 

        //METAS
        Route::get('Metas/Planea-Metas', [App\Http\Controllers\Metas\MetasController::class, 'index'])->name('Planea-Metas');
        //METAS

        //PIC
        Route::get('Pic/Planea-Pic', [App\Http\Controllers\Pic\PicController::class, 'index'])->name('Planea-Pic');
        //PIC

        Route::get('prueba',[App\Http\Controllers\UsersController::class, 'show'])->name('prueba');
