@extends('layouts.app')

@section('content')

    <div class="nav-usuario">
        <a class="btn-regresar" href="{{ url('proveedor/create') }}">Nuevo Proveedor</a>
        <a class="btn-reporte" href="{{ route('reporte.proveedor') }}">Generar reporte</a>

    </div>
    <h1>Lista de Proveedor</h1>

    
    @if (session('mensaje'))
        <div style="color: green;">{{ session('mensaje') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Nombre del proveedor</th>
                <th>Telefono</th>
                <th>Correo</th>
               
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->nombre_proveedor }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>{{ $proveedor->correo }}</td>
           

                <td>
                    <a class="boton-edit" href="{{ route('proveedor.edit', $proveedor->id) }}">Editar</a>
                    <form class="form-boton-delete" action="{{ route('proveedor.destroy', $proveedor->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $proveedores->links() }}
@endsection
