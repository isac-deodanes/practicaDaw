@extends('layouts.app')
@section('content')


    <!-- <link rel="stylesheet" href="css.css"> -->
    <div class="nav-usuario">
        <a class="btn-regresar" href="{{ route('proveedor.index') }}">Volver al listado</a>

    </div>

    <h1>Nuevo Proveedor</h1>

    <form action="{{ route('proveedor.store') }}" method="POST">
        @csrf
        <label>Nombre del proveedor:</label>
        <input type="text" name="name" required><br>

        <label>Correo electronico:</label>
        <input type="email" name="email" required><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required><br>

        <label>Telefono:</label>
        <input type="number" name="telefono" required><br>

        <label>Direccion:</label>
        <input type="text" name="direccion" required>

        <label>Tipo de proveedor:</label>
        <input type="text" name="tipo_proveedor">
       
        <button type="submit">Registrar</button>
    </form>

    <!-- <a href="#">Volver al listado</a> -->

@endsection