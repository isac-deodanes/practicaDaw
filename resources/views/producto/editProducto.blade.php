

@extends('layouts.app')
@section('content')
  <div class="nav-usuario">
    <a class="btn-regresar" href="{{ route('producto.index') }}">Volver al listado</a>

  </div>

    <h1>Editar Producto</h1>

    <form action="{{ route('producto.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')  

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" required><br>

        <label>precio:</label>
        <input type="number" name="precio" value="{{ $producto->precio }}" required><br>

        <label>marca:</label>
        <input type="text" name="marca" value="{{ $producto->marca }}" required><br>

       
        <button class="boton-edit" type="submit">Actualizar</button>
    </form>

@endsection