@extends('layouts.app')
@section('content')


    <!-- <link rel="stylesheet" href="css.css"> -->
    <div class="nav-usuario">
        <a class="btn-regresar" href="{{ route('proveedor.index') }}">Volver al listado</a>

    </div>
 
    <h1>Editar Proveedor</h1>

    <form action="{{ route('proveedor.update',$proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')  

        <label>Nombre del proveedor:</label>
        <input type="text" name="name" value="{{ $proveedor->user->name }}" required><br>

        <label>Correo electronico:</label>
        <input type="email" name="email" value="{{ $proveedor->user->email }}" required><br>

        <label>Contraseña:</label>
        <input type="password" name="password" value="{{ $proveedor->user->password }}" required><br>

        <label>Telefono:</label>
        <input type="number" name="telefono" value="{{ $proveedor->telefono }}" required><br>

        <label>Direccion:</label>
        <input type="text" name="direccion" value="{{ $proveedor->direccion }}" required>

        <label>Tipo de proveedor:</label>
        <input type="text" name="tipo_proveedor" value="{{ $proveedor->tipo_proveedor }}" required>

        <button class="boton-edit" type="submit">Actualizar</button>
    </form>

    <!-- <a href="#">Volver al listado</a> -->

@endsection