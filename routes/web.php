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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imoveis', 'PropertyController@index')->name('imoveis.index');
Route::get('/imoveis/novo', 'PropertyController@create')->name('imoveis.create');
Route::post('/imoveis/store', 'PropertyController@store')->name('imoveis.store');
Route::get('/imoveis/show/{name}', 'PropertyController@show')->name('imoveis.show');
Route::get('/imoveis/edit/{id}', 'PropertyController@edit')->name('imoveis.edit');
Route::delete('/imoveis/delete/{id}', 'PropertyController@destroy')->name('imoveis.destroy');
