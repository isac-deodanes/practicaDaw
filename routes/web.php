<?php
use App\Http\Controllers\reposteEmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\reporteProductoController;
use App\Http\Controllers\reporteProveedorController;



// Route::get('/', function () {
//     return view('home');
// });

// route::get('/', function () {
//     return view('login');
// })->name('login');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);


Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
    
// route::resource('login', AuthController::class);
//OTRA FORMA DE ENRUTAR
route::resource('inicio', DashboardController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('producto', ProductoController::class);
Route::resource('proveedor', ProveedorController::class);
// Ruta para reporte 
Route::get('/reporte-empleados', [reposteEmpleadoController::class, 'generar'])->name('reporte.empleado');
// Ruta para reporte 
Route::get('/reporte-producto', [reporteProductoController::class, 'generar'])->name('reporte.producto'); 
Route::get('/reporte-proveedor', [reporteProveedorController::class, 'generar'])->name('reporte.proveedor'); 



