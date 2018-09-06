<?php

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


Route::get('/', 'PageController@index')->name('page.index');


Route::get('cargarcitios/{destion}', 'PageController@cargarcitios')->name('page.cargarcitios');
Route::get('cargar_fecha_nrodias/{cargarcitios}', 'PageController@cargar_fecha_nrodias')->name('page.cargar_fecha_nrodias');
