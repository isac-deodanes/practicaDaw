<?php

namespace App\Http\Controllers;
use App\Models\proveedores;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        //
        // return view('empleado.index');
        $proveedor['proveedores']= proveedores::paginate(10);
        return view('proveedor.indexProveedor',$proveedor);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('proveedor.createProveedor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosProveedor=request()->except('_token');
        proveedores::insert($datosProveedor);  //este cmd inserta a la db
        // return response ()->json($datosEmpleado);
        return redirect('proveedor')->with('mensaje', 'proveedor agregado con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(proveedores $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $proveedor = proveedores::findOrFail($id);
        return view('proveedor.editProveedor', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id)
    {
        $datosProveedor = $request->except(['_token', '_method']);
        proveedores::where('id', '=', $id)->update($datosProveedor);
        return redirect('proveedor')->with('mensaje', 'proveedor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        // funcion para eliminar el registro
        proveedores::destroy($id);
        return redirect('proveedor')->with('mensaje', 'proveedor eliminado');
    }
}
