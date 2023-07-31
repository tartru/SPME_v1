<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Monitoreo\Asm\FichasASM;

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
    Route::get('asm/fichas', [App\Http\Controllers\asm\AsmRecomendacionesController::class, 'fichas'])->middleware('auth')->name('asm.fichas.index');

    //Asm-listado

    //Asm-recomendaciones
    Route::get('asm/recomendaciones', [App\Http\Controllers\asm\AsmRecomendacionesController::class, 'recomendaciones'])->middleware('auth')->name('asm.recomendaciones.index');
    //Asm-recomendaciones

    //Asm-recomendaciones
    Route::get('asm/criterios', [App\Http\Controllers\asm\AsmRecomendacionesController::class, 'criterios'])->middleware('auth')->name('asm.criterios.index');
    Route::put('asm/criterios', function() {
    })->middleware('auth')->name('asm.criterios.update');
    //Asm-recomendaciones

//ASM

