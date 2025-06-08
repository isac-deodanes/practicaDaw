@extends('layouts.app')

@section('content')

    <div class="nav">
        <a href="{{ url('producto/create') }}">Nuevo Producto</a>
        <a href="{{ route('reporte.producto') }}">Generar reporte</a>

    </div>
    <h1>Lista de productos</h1>

    
    @if (session('mensaje'))
        <div style="color: green;">{{ session('mensaje') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>marca</th>
               
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->marca }}</td>
           

                <td>
                    <a class="boton-edit" href="{{ route('producto.edit', $producto->id) }}">Editar</a>
                    <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $productos->links() }}
@endsection
