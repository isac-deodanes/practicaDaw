<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
 
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return view('empleado.index');
        $datos['empleados']= Empleado::paginate(10);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosEmpleado=request()->except('_token');
        Empleado::insert($datosEmpleado);  //este cmd inserta a la db
        // return response ()->json($datosEmpleado);
        return redirect('empleado')->with('mensaje', 'Empleado agregado con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id)
    {
        $datosEmpleado = $request->except(['_token', '_method']);
        Empleado::where('id', '=', $id)->update($datosEmpleado);
        return redirect('empleado')->with('mensaje', 'Empleado actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado eliminado');
    }

    // public function destroy ($id){
    //     // esta funcion elimnia registro
    //     Empleado::destroy($id);
    //     return redirect ('empleado');
    // }
}
