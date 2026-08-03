<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use Barryvdh\DomPDF\Facade\Pdf; 

class reporteProductoController extends Controller
{
    //
    public function generar(){

        $producto = producto::all();   //botenenmos todos los produccto
        $pdf = Pdf::loadView("reportes.reporteProducto",compact("producto"));

        return $pdf->stream("reporteProducto.pdf");    //dowload() por si desea descargar
    }
}
     