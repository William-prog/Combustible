<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VehiculosController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('departamento', DepartamentosController::class);
Route::resource('area', AreaController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('vehiculo', VehiculosController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
