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


Route::middleware('guest')->group(function () {
    // Redirige la raíz hacia la pantalla de login
    Route::view('/', 'login');

    // Muestra la vista de login directamente por GET al entrar a /login
    Route::view('/login', 'login')->name('login');

    // Procesa el inicio de sesión por POST
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// podria separar rutas por su propio rol, pero como es una demo para
// mostrar las rutas para un rol autenticado

Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', [DashboardController::class, 'index'])->name('inicio');

    // Rutas de administración
    Route::middleware(['role:administrador,proveedor,empleado'])->group(function () {
        Route::resource('empleados', EmpleadoController::class);
        Route::resource('productos', ProductoController::class);
        Route::resource('proveedores', ProveedorController::class); 

        Route::get('/reporte/empleados', [reposteEmpleadoController::class, 'generarReporte'])->name('reporte.empleados');
        Route::get('/reporte/productos', [reporteProductoController::class, 'generarReporte'])->name('reporte.productos');
        Route::get('/reporte/proveedores', [reporteProveedorController::class, 'generarReporte'])->name('reporte.proveedores');
    });

});




