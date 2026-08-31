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


Route::get('/', [AuthController::class, 'showLogin'])
    ->name('login');
    
Route::middleware('guest')->group(function () {
    
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
    
});
        
Route::middleware('auth',)->group(function () {
            
    Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
});
    
// podria separar rutas por su propio rol, pero como es una demo para
// mostrar las rutas para un rol autenticado
route::middleware(['auth'])->group(function(){
    //OTRA FORMA DE ENRUTAR
    route::get('inicio',[ DashboardController::class,'index'])->name('inicio.index');
    Route::resource('empleado', EmpleadoController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('proveedor', ProveedorController::class);

    // Ruta para reporte 
    Route::get('/reporte-empleados', [reposteEmpleadoController::class, 'generar'])->name('reporte.empleado');
    Route::get('/reporte-producto', [reporteProductoController::class, 'generar'])->name('reporte.producto'); 
    Route::get('/reporte-proveedor', [reporteProveedorController::class, 'generar'])->name('reporte.proveedor'); 
});




