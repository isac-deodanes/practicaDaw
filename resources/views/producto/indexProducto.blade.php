@extends('layouts.app')

@section('content')

    <h1>Lista de productos</h1>
    <div class="nav-usuario">
        <a class="btn-regresar" href="{{ url('producto/create') }}">Nuevo Producto</a>
        <a class="btn-reporte" href="{{ route('reporte.producto') }}">Generar reporte</a>

    </div>

    
    @if (session('mensaje'))
        <div style="color: green;">{{ session('mensaje') }}</div>
    @endif
    <div class="table-responsive">
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
                    <form class="form-boton-delete" action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    {{ $productos->links() }}
@endsection
