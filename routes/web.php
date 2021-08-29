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

Route::get('/imoveis/edit/{name}', 'PropertyController@edit')->name('imoveis.edit');
Route::put('/imoveis/update/{name}', 'PropertyController@update')->name('imoveis.update');

Route::get('/imoveis/show/{name}', 'PropertyController@show')->name('imoveis.show');

Route::get('/imoveis/delete/{name}', 'PropertyController@destroy')->name('imoveis.destroy');
