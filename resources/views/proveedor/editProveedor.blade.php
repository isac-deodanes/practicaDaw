@extends('layouts.app')
@section('content')


    <!-- <link rel="stylesheet" href="css.css"> -->
    <div class="nav-2">
        <a href="{{ route('proveedor.index') }}">Volver al listado</a>

    </div>
 
    <h1>editar Proveedor</h1>

    <form action="{{ route('proveedor.update',$proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')  

        <label>Nombre del proveedor:</label>
        <input type="text" name="nombre_proveedor" value="{{$proveedor->nombre_proveedor}}" required><br>

        <label>Telefono:</label>
        <input type="number" name="telefono" value="{{ $proveedor->telefono }}" required><br>

        <label>Correo electronico:</label>
        <input type="gmail" name="correo" value="{{$proveedor->correo }}" required><br>


        </select>

        <button class="boton-edit" type="submit">Actualizar</button>
    </form>

    <!-- <a href="#">Volver al listado</a> -->

@endsection