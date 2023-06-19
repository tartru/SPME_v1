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
    Route::get('evaluacion', function () {
        return view('evaluacion.index', ['menu_active' => 'evaluacion', 'breadcrumb' => ['Evaluacion' => '']]);
    })->name('evaluacion_index');
