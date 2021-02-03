<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/catalogos/programa', function () {
    return view('catalogos.programa');
});

Route::get('/catalogos/actividad', function () {
    return view('catalogos.actividad');
});

Route::get('catalogos/renglon', function (){
    return view('catalogos.renglon');
});

Route::get('catalogos/fuente', function (){
    return view('catalogos.fuente');
});

Route::get('catalogos/llenado', function (){
    return view('catalogos.llenado');
});