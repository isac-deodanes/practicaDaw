<?php
use App\Http\Controllers\reposteEmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\reporteProductoController;
use App\Http\Controllers\reporteProveedorController;



Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dato', function () {
//     return view('prueba');
// });

// Route::get('/home', function () { 
//     return view('home');
// });

// Route::get('/empleados', function () {
//     return view('empleado.index');
// });

// Route::get('/crear', function () {
//     return view('empleado.create');
// });
route::get('/home', function () {
    return view('home');
})->name('home');
route::get('/prueba', function () {
    return view('prueba');
})->name('prueba');


//OTRA FORMA DE ENRUTAR
Route::resource('empleado', EmpleadoController::class);
Route::resource('producto', ProductoController::class);
Route::resource('proveedor', ProveedorController::class);

// Ruta para reporte 
Route::get('/reporte-empleados', [reposteEmpleadoController::class, 'generar'])->name('reporte.empleado');
// Ruta para reporte 
Route::get('/reporte-producto', [reporteProductoController::class, 'generar'])->name('reporte.producto'); 
Route::get('/reporte-proveedor', [reporteProveedorController::class, 'generar'])->name('reporte.proveedor'); 



