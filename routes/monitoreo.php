<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| planeacion Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    //Administracion
        Route::get('monitoreo', function () {
            return view('monitoreo.index', ['menu_active' => 'monitoreo_index', 'breadcrumb' => ['Monitoreo' => '']]);
        })->name('Monitoreo_index');
    //Administracion

//ASM

    //Asm-listado
    Route::get('asm/fichas', [App\Http\Controllers\asm\AsmFichaController::class, 'index'])->middleware('auth')->name('asm_fichas');
    //Asm-listado

    //Asm-recomendaciones
    Route::get('asm/recomendaciones', [App\Http\Controllers\asm\AsmRecomendacionesController::class, 'index'])->middleware('auth')->name('asm_recomendaciones');
    //Asm-recomendaciones

//ASM

