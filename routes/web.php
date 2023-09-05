<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\ValeCombustibleController;




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
Route::resource('vales', ValeGasolinaController::class);
Route::resource('valeCombustible',ValeCombustibleController::class);

Route::get('callCar',[VehiculosController::class,'fetchCar']); 
Route::get('callEmp',[EmpleadoController::class,'fetchEmp']);
Route::get('callDep',[DepartamentosController::class,'fetchDep']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
