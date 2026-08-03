@extends('layouts.app')
@section('content')


    <!-- <link rel="stylesheet" href="css.css"> -->
    <div class="nav-usuario">
        <a class="btn-regresar" href="{{ route('producto.index') }}">Volver al listado</a>
    </div>

    <h1>Nuevo Producto</h1>

    <form action="{{ route('producto.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label>Precio:</label>
        <input type="number" name="Precio" required><br>

        <label>Marca:</label>
        <input type="txt" name="Marca" required><br>


        </select>

        <button type="submit">Registrar</button>
    </form>

    <!-- <a href="#">Volver al listado</a> -->

@endsection