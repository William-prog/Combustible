<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\ValeCombustibleController;
use App\Http\Controllers\PanelAdminController;
use App\Http\Controllers\ConsumoController;




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
Route::resource('panel', PanelAdminController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('vehiculo', VehiculosController::class);
Route::resource('valeCombustible', ValeCombustibleController::class);

<<<<<<< HEAD
=======
Route::post('/valeCombustible/{id}','ValeCombustibleController@update')->name('valeCombustible.update');

>>>>>>> 1e5818d99992744c2bdb4a9304ebff8b8e859672
Route::get('callCar',[VehiculosController::class,'fetchCar']); 
Route::get('callEmp',[EmpleadoController::class,'fetchEmp']);
Route::get('callDep',[DepartamentosController::class,'fetchDep']);

Route::resource('consumo', ConsumoController::class);

Route::get('/file-import',[ConsumoController::class, 'importView'])->name('import');



Route::post('/import',[ConsumoController::class, 'import'])->name('import');
Route::get('/export-consumo',[ConsumoController::class,'exportConsumo'])->name('export');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


