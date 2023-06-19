<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
 
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

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();
    // $user->token
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
 
    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/dashboard');
});

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
        return view('admin.index', ['menu_active' => 'admin_index', 'breadcrumb' => ['Administrar' => '']]);
    })->name('admin.index');

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
        Route::get('usuarios', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth')->name('admin.usuarios.index');
        Route::get('usuarios/{row}', [App\Http\Controllers\UsersController::class, 'edit'])->middleware('auth')->name('admin.usuarios.edit');
        Route::get('profile', [App\Http\Controllers\UsersController::class, 'profile'])->middleware('auth')->name('admin_profile');
     // usuarios
     
     //Roles
        Route::get('roles', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth')->name('admin_config'); //por configurar
     //Roles
     
    // bitacora
        Route::get('bitacora', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth')->name('admin_bitacora'); //por configurar
    //bitacora

    // correos
        Route::get('correos', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth')->name('admin_plantillas_correos'); //por configurar
    //correos
     // grupos captura
     Route::get('Cat/grupos_capturas', [App\Http\Controllers\GruposCapturasController::class, 'index'])->middleware('auth')->name('admin_grupos_captura'); //NO CONFIGURADO
     // grupos captura

//Configuracion

//Programa Anual de Trabajo
        //PAT
            Route::get('Pat/Planea-Pat', [App\Http\Controllers\Pat\PatController::class, 'estados'])->middleware('auth')->name('Planea-Pat');
        //PAT
//Programa Anual de Trabajo

//Indicadores 
        //MIR
        Route::get('Mir/Planea-Mir', [App\Http\Controllers\Mir\MirController::class, 'index'])->middleware('auth')->name('Planea-Mir');
        //MIR
//Indicadores 

        //METAS
        Route::get('Metas/Planea-Metas', [App\Http\Controllers\Metas\MetasController::class, 'index'])->middleware('auth')->name('Planea-Metas');
        //METAS

        //PIC
        Route::get('Pic/Planea-Pic', [App\Http\Controllers\Pic\PicController::class, 'index'])->middleware('auth')->name('Planea-Pic');
        //PIC

        Route::get('prueba',[App\Http\Controllers\UsersController::class, 'show'])->middleware('auth')->name('prueba');
