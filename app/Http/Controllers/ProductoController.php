<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
 
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return view('empleado.index');
        $productos['productos']= Producto::paginate(10);
        return view('producto.indexProducto',$productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('producto.createProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosProducto=request()->except('_token');
        Producto::insert($datosProducto);  //este cmd inserta a la db
        // return response ()->json($datosEmpleado);
        return redirect('producto')->with('mensaje', 'producto agregado con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $producto = Producto::findOrFail($id);
        return view('producto.editProducto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id)
    {
        $datosProducto = $request->except(['_token', '_method']);
        Producto::where('id', '=', $id)->update($datosProducto);
        return redirect('producto')->with('mensaje', 'producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        // funcion para eliminar el registro
        Producto::destroy($id);
        return redirect('producto')->with('mensaje', 'producto eliminado');
    }

}
