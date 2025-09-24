<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FincaController;
use App\Http\Controllers\InvernaderoController;
use App\Http\Controllers\CosechaController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\CategoriaGastoController;
use App\Http\Controllers\TipoCultivoController;
use App\Http\Controllers\EstadoCosechaController;
use App\Http\Controllers\MantenimientoInvernaderoController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::resource('fincas', FincaController::class);


Route::resource('invernaderos', InvernaderoController::class);


Route::resource('cosechas', CosechaController::class);


Route::resource('ingresos', IngresoController::class);


Route::resource('gastos', GastoController::class);


Route::resource('categorias', CategoriaGastoController::class);


Route::resource('tiposcultivo', TipoCultivoController::class);


Route::resource('estados', EstadoCosechaController::class);


Route::resource('mantenimientos', MantenimientoInvernaderoController::class);
