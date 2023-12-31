<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\ValeCombustibleController;
use App\Http\Controllers\PanelAdminController;
use App\Http\Controllers\Estadistica;
use App\Http\Controllers\estadisticaValeController;
use App\Http\Controllers\ConsumoController;
use App\Http\Controllers\rolController;

use Illuminate\Support\Facades\Crypt;




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
    return redirect()->route('valeCombustible.index');
});

Auth::routes();

Route::resource('departamento', DepartamentosController::class);
Route::resource('area', AreaController::class);
Route::resource('panel', PanelAdminController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('vehiculo', VehiculosController::class);
Route::resource('valeCombustible', ValeCombustibleController::class);
Route::resource('estadistica', Estadistica::class);
Route::resource('estadisticaVale', estadisticaValeController::class);
Route::resource('rol', rolController::class);


Route::post('/valeCombustible/{id}','ValeCombustibleController@update')->name('valeCombustible.update');

Route::get('/formatosPdfPDF/pdf/{id}',[ValeCombustibleController::class,'informePDF'])->name('informePDF');

Route::resource('panel', PanelAdminController::class);

Route::get('callCar',[VehiculosController::class,'fetchCar']); 
Route::get('callEmp',[EmpleadoController::class,'fetchEmp']);
Route::get('callDep',[DepartamentosController::class,'fetchDep']);

Route::resource('consumo', ConsumoController::class);

Route::get('/file-import',[ConsumoController::class, 'importView'])->name('import');

Route::post('/import',[ConsumoController::class, 'import'])->name('import');
Route::get('/export-consumo',[ConsumoController::class,'exportConsumo'])->name('export');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


