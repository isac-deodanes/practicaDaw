@extends('layouts.app')
@section('content')


    <!-- <link rel="stylesheet" href="css.css"> -->
    <div class="nav-2">
        <a href="{{ route('proveedor.index') }}">Volver al listado</a>

    </div>
 
    <h1>Nuevo Proveedor</h1>

    <form action="{{ route('proveedor.store') }}" method="POST">
        @csrf
        <label>Nombre del proveedor:</label>
        <input type="text" name="nombre_proveedor" required><br>

        <label>Telefono:</label>
        <input type="number" name="telefono" required><br>

        <label>Correo electronico:</label>
        <input type="gmail" name="correo" required><br>


        </select>

        <button type="submit">Registrar</button>
    </form>

    <!-- <a href="#">Volver al listado</a> -->

@endsection