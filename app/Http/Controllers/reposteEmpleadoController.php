<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;


class reposteEmpleadoController extends Controller
{
    //
    public function generar()
    {
        $empleados = Empleado::all(); // obtenemos todos los empleados 

        $pdf = Pdf::loadView('reportes.reporteEmpleado', compact('empleados'));

        return $pdf->stream('reporte_empleados.pdf'); // o ->download() 

    }
}
