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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('programa','ProgramaController');

Route::resource('actividad','ActividadController');

Route::resource('renglon','RenglonController');

Route::resource('fuente','FuenteController');

Route::resource('entidad','EntidadController');

Route::resource('unidad_ejecutora','UnidadEjecutoraController');

Route::resource('centro_costo','CentroCostoController');

Route::resource('producto','ProductoController');