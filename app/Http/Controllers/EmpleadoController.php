<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $datos['empleados'] = Empleado::with('user')->paginate(10);

        return view('Empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'apellido' => 'required|string|max:255',
                // si da error es por el nombre en el formulario del frontend
            'email' => 'required|email|unique:users,email',

            'password' => 'required|string|min:8',

            'dui' => 'required|string|max:20|unique:empleados,dui',

            'telefono' => 'required|string|max:20',

            'salario' => 'required|numeric|min:0',

            'area' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($request) {

            // 1. Crear usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rol' => 'empleado',
            ]);


            // 2. Crear empleado relacionado
            Empleado::create([
                'user_id' => $user->id,
                'apellido' => $request->apellido,
                'dui' => $request->dui,
                'telefono' => $request->telefono,
                'salario' => $request->salario,
                'area' => $request->area,
            ]);
        });

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
        return view('Empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::with('user')->findOrFail($id);

        // campos de usuario
        $empleado->user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $empleado->update([
            'apellido'=> $request->input('apellido'),
            'dui'=>$request->input('dui'),
            'telefono'=>$request->input('telefono'),
            'salario'=>$request->input('salario'),
            'area'=> $request->input('area')
        ]);

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

}
