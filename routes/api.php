<?php

use App\Http\Controllers\HabitacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TipoHabitacionController;

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

Route::controller(PersonaController::class)->group(function () {
    Route::get('/index-persona',        'index');
    Route::get('/persona/{id}',         'show');
    Route::post('/crear-persona',       'store');
    Route::put('/actualizar-persona',  'update');
});

Route::controller(HabitacionController::class)->group(function () {
    Route::get('/index-habitacion',     'index');
    Route::post('/crear-habitacion',    'store');
    Route::get('/habitacion/{id}',      'show');
    Route::put('/actualizar-habitacion','update');
});

Route::controller(TipoHabitacionController::class)->group(function () {
    Route::get('/index-tipos-habitacion',       'index');
    Route::post('/crear-tipos-habitacion',      'store');
    Route::get('/tipos-habitacion/{id}',        'show');
    Route::get('/actualizar-tipos-habitacion',  'index');
});