<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;
use Barryvdh\DomPDF\Facade\Pdf;


class reporteProveedorController extends Controller
{
    //
    public function generarReporte()
    {
        $proveedores = Proveedores::all(); // obtenemos todos 

        $pdf = Pdf::loadView('reportes.reporteProveedor', compact('proveedores'));

        return $pdf->stream('reporte_proveedor.pdf'); // o ->download() 

    }
}
