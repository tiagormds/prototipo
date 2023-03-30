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

Route::get('/imoveis', [\App\Http\Controllers\PropertyController::class, 'index'])->name('imovel.index');

Route::get('/imoveis/create', [\App\Http\Controllers\PropertyController::class, 'create'])->name('imovel.create');
Route::post('/imoveis/store', [\App\Http\Controllers\PropertyController::class, 'store'])->name('imovel.store');

Route::get('/imoveis/{name}/show', [\App\Http\Controllers\PropertyController::class, 'show'])->name('imovel.show');

Route::get('/imoveis/{name}/edit', [\App\Http\Controllers\PropertyController::class, 'edit'])->name('imovel.edit');
Route::put('/imoveis/{name}/update', [\App\Http\Controllers\PropertyController::class, 'update'])->name('imovel.update');

Route::delete('/imoveis/{name}/destroy', [\App\Http\Controllers\PropertyController::class, 'destroy'])->name('imovel.destroy');
