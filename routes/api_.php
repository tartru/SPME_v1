<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('validate_token', 'App\Http\Controllers\AuthenticationController@validate_token')->name('validate_token');

Route::post('admin/municipios/filtrar', [App\Http\Controllers\Admin\CatMunicipiosController::class, 'filter'])->name('admin_municipios_filtered');