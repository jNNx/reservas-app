<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\LoginController;
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

Route::controller(LoginController::class)->group(function () {
    Route::post('/login',    'authenticate');
});
Route::get('/asignar-permisos',     [UserController::class, 'asignarPermisos']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/salir',                [LoginController::class, 'logout']);

    /* Persona */
    Route::get('/index-persona',        [PersonaController::class, 'index']);
    Route::get('/persona/{id}',         [PersonaController::class, 'show']);
    Route::post('/crear-persona',       [PersonaController::class, 'store']);
    Route::put('/actualizar-persona',   [PersonaController::class, 'update']);

    /* Habitacion */
    Route::get('/index-habitacion',     [HabitacionController::class, 'index']);
    Route::post('/crear-habitacion',    [HabitacionController::class, 'store']);
    Route::get('/habitacion/{id}',      [HabitacionController::class, 'show']);
    Route::put('/actualizar-habitacion',[HabitacionController::class, 'update']);

    /* Tipos habitacion */
    Route::get('/index-tipos-habitacion',       [TipoHabitacionController::class, 'index']);
    Route::post('/crear-tipos-habitacion',      [TipoHabitacionController::class, 'store']);
    Route::get('/tipos-habitacion/{id}',        [TipoHabitacionController::class, 'show']);
    Route::put('/actualizar-tipos-habitacion',  [TipoHabitacionController::class, 'update']);

    /* Reserva */
    Route::get('/index-reserva',        [ReservaController::class, 'index']);
    Route::get('/reserva/{id}',         [ReservaController::class, 'show']);
    Route::post('/crear-reserva',       [ReservaController::class, 'store']);
    Route::put('/actualizar-reserva',   [ReservaController::class, 'update']);
    //Route::delete('/eliminar-reserva',   [ReservaController::class, 'destroy'])->middleware(['can:ELIMINAR RESERVA']);

    /** Usuario */
    Route::get('/index-usuario',                 [UserController::class, 'index']);
    Route::post('/crear-usuario',                [UserController::class, 'store'])->middleware(['can:AGREGAR USUARIO']);
    Route::delete('/eliminar-usuario/{id}',      [UserController::class, 'destroy'])->middleware(['can:ELIMINAR USUARIO']);
});