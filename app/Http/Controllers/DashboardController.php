<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\proveedores;
use App\Models\producto;

class DashboardController extends Controller
{
    //

    public function index(){
        $totalEmpleado = Empleado::count();
        $totalProveedores = proveedores::count();
        $totalProductos = producto::count();

        $ultimoEmpleado = Empleado::orderBy('id', 'desc')->first();
        $ultimoProveedor = proveedores::orderBy('id', 'desc')->first();
        $ultimoProducto = producto::orderBy('id', 'desc')->first();


        return view('inicio',compact(
    
            'totalEmpleado',
            'totalProveedores',
            'totalProductos',
            'ultimoEmpleado',
            'ultimoProveedor',
            'ultimoProducto'
        ));
    }
}
