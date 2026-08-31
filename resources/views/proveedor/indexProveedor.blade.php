@extends('layouts.app')

@section('content')

    @php
        $contProveedor = 1;
    @endphp
    <h1>Lista de Proveedor</h1>
    <div class="nav-usuario">
        <a class="btn-regresar" href="{{ url('proveedor/create') }}"><img src="{{ asset('icon-add.svg') }}" width="30" alt=""> Nuevo Proveedor</a>
        <a class="btn-reporte" href="{{ route('reporte.proveedor') }}"><img src="{{ asset('icon-report.svg') }}" width="30" alt=""> Generar reporte</a>

    </div>


    @if (session('mensaje'))
        <div style="color: green;">{{ session('mensaje') }}</div>
    @endif
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>N.</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Direccion</th>
                    <th>Tipo de proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $contProveedor++ }}</td>
                        <td>{{ $proveedor->user->name }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->user->email }}</td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>{{ $proveedor->tipo_proveedor }}</td>



                        <td>
                            <a class="boton-edit" href="{{ route('proveedor.edit', $proveedor->id) }}"><img src="{{ asset('icon-edit.svg') }}" width="30" alt="">EDITAR</a>
                            <form class="form-boton-delete" action="{{ route('proveedor.destroy', $proveedor->id) }}"
                                method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro de eliminar?')"><img src="{{ asset('trash.svg') }}" width="26" alt=""> ELIMINAR</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $proveedores->links() }}
@endsection