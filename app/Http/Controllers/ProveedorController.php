<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $proveedor['Proveedores'] = Proveedores::with('user')->paginate(10);
        return view('proveedor.indexProveedor', $proveedor);
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
        
        $request->validate([
            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|string|min:8',

            'telefono' => 'required|string|max:8',

            'direccion' => 'required|string|max:255',

            'tipo_proveedor' => 'required|string|max:255',


        ]);


        DB::transaction(function () use ($request) {

            // Crear usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rol' => 'proveedor',
            ]);


            // Crear proveedor
            Proveedores::create([
                'user_id' => $user->id,
                'telefono' => $request->telefono,
                'direccion'=> $request->direccion,
                'tipo_proveedor'=> $request->tipo_proveedor
            ]);
        });

        return redirect()->route('proveedores.index')->with('mensaje', 'proveedor agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedores $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $proveedor = Proveedores::findOrFail($id);
        return view('proveedor.editProveedor', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $proveedor = Proveedores::with('user')->findOrFail($id);

        // campos de la tabla user
        $proveedor->user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        // campos de la tabla Proveedores
        $proveedor->update([
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'tipo_proveedor' => $request->input('tipo_proveedor')
        ]);
        return redirect()->route('proveedores.index')->with('mensaje', 'proveedor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // funcion para eliminar el registro
        Proveedores::destroy($id);
        return redirect()->route('proveedores.index')->with('mensaje', 'proveedor eliminado');
    }
}
