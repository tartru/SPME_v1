<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
 
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

//login
Route::get('login', [App\Http\Controllers\AuthenticationController::class,'auth_login'])->name('login');
Route::post('login', [App\Http\Controllers\AuthenticationController::class,'authenticate'])->name('login'); 
Route::get('validate',[App\Http\Controllers\AuthenticationController::class,'validate_token'])->name('validate');
Route::get('logout',[App\Http\Controllers\AuthenticationController::class,'logout'])->name('logout');
Route::get('login/google/', [App\Http\Controllers\AuthenticationController::class,'google'])->name('login.google');
Route::get('/callback-url', [App\Http\Controllers\AuthenticationController::class,'google_auth'])->name('auth.google');

 
//Account

/*//General
    Route::get('/', function () {
        if(auth::check()) {
            if((auth()->user()->active)==0) {
            return redirect()->route('welcome');
            }
        }
        else {
            return view('account.login')->with('message',"Tu Sesión expiró, Inicia nuevamente");
        }
        return view ('general.home');
    })->name('home');
//General
*/

    
    Route::get('/',[App\Http\Controllers\AuthenticationController::class,'welcome'])->name('home');

    Route::get('/welcome',[App\Http\Controllers\AuthenticationController::class,'welcome'])->middleware('auth')->name('welcome');

    //Route::post('/',[App\Http\Controllers\ValidaController::class, 'validate_token'])->name('validate');
 

//Administracion
    Route::get('admin', function () {
        return view('admin.index', ['menu_active' => 'admin.index', 'breadcrumb' => ['Administrar' => '']]);
    })->name('admin.index');

    //Estatus
         Route::get('Cat/estatus', [App\Http\Controllers\Cat\CatEstatusController::class,'index'])->middleware('auth')->can('spme.admin.catalogos.index')->name('admin.estatus.index');
         Route::get('Cat/estatus/update/{row}', [App\Http\Controllers\Cat\CatEstatusController::class,'edit'])->middleware('auth')->can('spme.admin.catalogos.update')->name('admin.estatus.edit');
         Route::put('Cat/estatus/update/{row}', [App\Http\Controllers\Cat\CatEstatusController::class,'update'])->middleware('auth')->can('spme.admin.catalogos.update')->name('admin.estatus.update');
         Route::get('Cat/estatus/create/', [App\Http\Controllers\Cat\CatEstatusController::class,'create'])->middleware('auth')->can('spme.admin.catalogos.create')->name('admin.estatus.create');
         Route::post('Cat/estatus/create/', [App\Http\Controllers\Cat\CatEstatusController::class,'store'])->middleware('auth')->can('spme.admin.catalogos.create')->name('admin.estatus.store');
         Route::delete('Cat/estatus/delete/{row}', [App\Http\Controllers\Cat\CatEstatusController::class,'destroy'])->middleware('auth')->can('spme.admin.catalogos.delete')->name('admin.estatus.delete');
    //Estatus

    //Acciones
        Route::get('Cat/acciones', [App\Http\Controllers\Cat\CatAccionesController::class, 'index'])->middleware('auth')->can('spme.admin.catalogos.index')->name('admin.acciones.index');
        Route::get('Cat/acciones/update/{row}', [App\Http\Controllers\Cat\CatAccionesController::class, 'edit'])->middleware('auth')->can('spme.admin.catalogos.update')->name('admin.acciones.edit');
        Route::put('Cat/acciones/update/{row}', [App\Http\Controllers\Cat\CatAccionesController::class, 'update'])->middleware('auth')->can('spme.admin.catalogos.update')->name('admin.acciones.update');
        Route::get('Cat/acciones/create/', [App\Http\Controllers\Cat\CatAccionesController::class,'create'])->middleware('auth')->can('spme.admin.catalogos.create')->name('admin.acciones.create');
        Route::post('Cat/acciones/create/', [App\Http\Controllers\Cat\CatAccionesController::class,'store'])->middleware('auth')->can('spme.admin.catalogos.create')->name('admin.acciones.store');
        Route::delete('Cat/acciones/delete/{row}', [App\Http\Controllers\Cat\CatAccionesController::class,'destroy'])->middleware('auth')->can('spme.admin.catalogos.delete')->name('admin.acciones.delete');
    //Acciones

    //Tipos de captura
        Route::get('Cat/tipos_de_captura', [App\Http\Controllers\Cat\CatTipoCapturasController::class, 'index'])->middleware('auth')->name('admin.tipo_capturas');
    //Tipos de captura

    //Frecuencias de medición
        Route::get('Cat/frecuencias_de_medicion', [App\Http\Controllers\Cat\CatFrecuenciasMedicionesController::class, 'index'])->middleware('auth')->name('admin.frecuencias_mediciones');
    //Frecuencias de medición

    //Orígenes presupuestales
        Route::get('Cat/origenes_presupuestales', [App\Http\Controllers\Cat\CatOrigenesPresupuestalesController::class, 'index'])->middleware('auth')->name('admin.origenes_presupuestales');
    //Orígenes presupuestales

    //Regiones OK
        Route::get('Cat/regiones', [App\Http\Controllers\Cat\CatRegionesController::class, 'agrupado'])->middleware('auth')->name('admin.regiones');
    //Regiones

    //Entidades federativas OK
        Route::get('Cat/entidades_federativas', [App\Http\Controllers\Cat\CatEntidadesFederativasController::class, 'agrupado'])->middleware('auth')->name('admin.entidades_federativas');
        Route::get('admin/entidades_federativas/region/{cat_region_id}', [App\Http\Controllers\Admin\CatEntidadesFederativasController::class, 'index'])->middleware('auth')->name('admin_entidades_federativas_by_region_id'); //VERIFICAR LIGA
    //Entidades federativas

    //Municipios OK
        Route::get('Cat/municipios', [App\Http\Controllers\Cat\CatMunicipiosController::class, 'agrupado'])->middleware('auth')->name('admin.municipios');
        //Route::get('admin/municipios/entidad/{cat_entidad_federativa_id}', [App\Http\Controllers\Admin\CatMunicipiosController::class, 'index'])->name('admin_municipios_by_entidad_federativa_id'); //VERIFICAR LIGA
        Route::get('Cat/municipios/entidad/{cat_entidad_federativa_id}', [App\Http\Controllers\Cat\CatMunicipiosController::class, 'CatMunicipiId'])->middleware('auth')->name('admin.municipios_by_entidad_federativa_id'); //VERIFICAR LIGA
    //Municipios

    // Grupos de captura
        Route::get('Cat/grupos_captura', [App\Http\Controllers\Cat\CatGruposCapturasController::class, 'index'])->middleware('auth')->name('admin.grupos_capturas.index');
        Route::get('Cat/grupos_captura/update/{row}', [App\Http\Controllers\Cat\CatGruposCapturasController::class, 'edit'])->middleware('auth')->can('spme.admin.grupos_capturas.update')->name('admin.grupos_capturas.edit');
        Route::put('Cat/grupos_captura/update/{row}', [App\Http\Controllers\Cat\CatGruposCapturasController::class, 'update'])->middleware('auth')->can('spme.admin.grupos_capturas.update')->name('admin.grupos_capturas.update');
        Route::get('Cat/grupos_captura/create/', [App\Http\Controllers\Cat\CatGruposCapturasController::class, 'create'])->middleware('auth')->can('spme.admin.grupos_capturas.create')->name('admin.grupos_capturas.create');
        Route::post('Cat/grupos_captura/create/', [App\Http\Controllers\Cat\CatGruposCapturasController::class, 'store'])->middleware('auth')->can('spme.admin.grupos_capturas.create')->name('admin.grupos_capturas.store');
        Route::delete('Cat/grupos_captura/delete/{row}', [App\Http\Controllers\Cat\CatGruposCapturasController::class, 'destroy'])->middleware('auth')->can('spme.admin.grupos_capturas.delete')->name('admin.grupos_capturas.delete'); // por configurar

        Route::get('Cat/grupos_claves', [App\Http\Controllers\Cat\CarGruposClavesController::class, 'index'])->middleware('auth')->name('admin.grupos_claves.index');
    // Grupos de captura

     // Programas Presupuestales
        Route::get('Cat/programas_presupuestales', [App\Http\Controllers\Cat\CatProgramasPresupuestalesController::class, 'index'])->middleware('auth')->name('admin.programas_presupuestales');
     // Programas Presupuestales

//Administracion

//Configuracion
    // usuarios
        Route::get('adm/usuarios', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth')->can('spme.admin.users.index')->name('admin.users.index');
        Route::get('adm/usuarios/update/{row}', [App\Http\Controllers\UsersController::class, 'edit'])->middleware('auth')->can('spme.admin.users.update')->name('admin.users.edit');
        Route::put('adm/usuarios/update/{user}', [App\Http\Controllers\UsersController::class, 'update'])->middleware('auth')->name('admin.users.update'); 
        Route::put('adm/usuarios/create/', [App\Http\Controllers\UsersController::class, 'create'])->middleware('auth')->can('spme.admin.users.create')->name('admin.users.create'); // por configurar
        Route::delete('adm/usuarios/delete/{row}', [App\Http\Controllers\Cat\RolesController::class, 'destroy'])->middleware('auth')->can('spme.admin.users.delete')->name('admin.users.delete'); // por configurar
        Route::get('adm/profile', [App\Http\Controllers\UsersController::class, 'profile'])->middleware('auth')->name('admin.users.profile');
        //Route::get('adm/profile/update/{row}', [App\Http\Controllers\UsersController::class, 'update'])->middleware('auth')->name('admin.users.profile.update');
        //Route::put('adm/profile/update/{row}', [App\Http\Controllers\UsersController::class, 'store'])->middleware('auth')->name('admin.users.profile.store');
        Route::get('adm/bandeja', [App\Http\Controllers\UsersController::class, 'bandeja'])->middleware('auth')->name('admin.users.bandeja');
        
     // usuarios
     
     //Roles
        Route::get('Cat/roles', [App\Http\Controllers\Cat\RolesController::class, 'index'])->middleware('auth')->name('admin.roles.index'); 
        Route::get('Cat/roles/update/{row}', [App\Http\Controllers\Cat\RolesController::class, 'edit'])->middleware('auth')->name('admin.roles.edit');
        Route::put('Cat/roles/update/{row}', [App\Http\Controllers\Cat\RolesController::class, 'update'])->middleware('auth')->name('admin.roles.update');
        Route::get('Cat/roles/create/', [App\Http\Controllers\Cat\RolesController::class, 'create'])->middleware('auth')->name('admin.roles.create');
        Route::post('Cat/roles/create/', [App\Http\Controllers\Cat\RolesController::class, 'store'])->middleware('auth')->name('admin.roles.store');
        Route::delete('Cat/roles/delete/{row}', [App\Http\Controllers\Cat\RolesController::class, 'destroy'])->middleware('auth')->name('admin.roles.delete');
     //Roles

     //permisos
        Route::get('Cat/permisos', [App\Http\Controllers\Cat\PermissionsController::class, 'index'])->middleware('auth')->name('admin.permisos.index'); 
        Route::get('Cat/permisos/update/{row}', [App\Http\Controllers\Cat\PermissionsController::class, 'edit'])->middleware('auth')->name('admin.permisos.edit');
        Route::put('Cat/permisos/update/{row}', [App\Http\Controllers\Cat\PermissionsController::class, 'update'])->middleware('auth')->name('admin.permisos.update');
        Route::get('Cat/permisos/create/', [App\Http\Controllers\Cat\PermissionsController::class, 'create'])->middleware('auth')->name('admin.permisos.create');
        Route::post('Cat/permisos/create/', [App\Http\Controllers\Cat\PermissionsController::class, 'store'])->middleware('auth')->name('admin.permisos.store');
        Route::delete('Cat/permisos/delete/{row}', [App\Http\Controllers\Cat\PermissionsController::class, 'destroy'])->middleware('auth')->name('admin.permisos.delete');
     //permisos
     
    // bitacora
        Route::get('bitacora', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth')->name('admin.bitacora'); //por configurar
    //bitacora

    // correos
        Route::get('correos', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth')->name('admin.plantillas_correos'); //por configurar
    //correos
     // grupos captura
     Route::get('Cat/grupos_capturas', [App\Http\Controllers\GruposCapturasController::class, 'index'])->middleware('auth')->name('admin.grupos_captura'); //NO CONFIGURADO
     // grupos captura

//Configuracion

//Programa Anual de Trabajo
        //PAT
            Route::get('Pat/Planea-Pat', [App\Http\Controllers\Pat\PatController::class, 'estados'])->middleware('auth')->name('pat.Planea-Pat');
        //PAT
//Programa Anual de Trabajo

//Indicadores 
        //MIR
        Route::get('Mir/Planea-Mir', [App\Http\Controllers\Mir\MirController::class, 'index'])->middleware('auth')->name('mir.Planea-Mir');
        //MIR
//Indicadores 

        //METAS
        Route::get('Metas/Planea-Metas', [App\Http\Controllers\Metas\MetasController::class, 'index'])->middleware('auth')->name('me.Planea-Metas');
        //METAS

        //PIC
        Route::get('Pic/Planea-Pic', [App\Http\Controllers\Pic\PicController::class, 'index'])->middleware('auth')->name('pic.Planea-Pic');
        //PIC

        Route::get('prueba',[App\Http\Controllers\UsersController::class, 'show'])->middleware('auth')->name('prueba');
