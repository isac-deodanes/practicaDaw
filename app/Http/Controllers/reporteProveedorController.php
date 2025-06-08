<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proveedores;
use Barryvdh\DomPDF\Facade\Pdf; 


class reporteProveedorController extends Controller
{
    //
          public function generar() 
    { 
        $proveedores = proveedores::all(); // obtenemos todos los empleados 
 
        $pdf = Pdf::loadView('reportes.reporteProveedor',compact('proveedores')); 
 
        return $pdf->stream('reporte_proveedor.pdf'); // o ->download() 

    }
}
