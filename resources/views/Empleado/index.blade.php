@extends('layouts.app')

@section('content')
    <@php
        $contEmpleado = 1
    @endphp

    <h1>Empleados</h1>
    <div class="nav-usuario">
        <a class="btn-regresar" href="{{ route('empleado.create') }}"><img src="{{ asset('icon-add.svg') }}" alt="" width="30"> Nuevo Empleado</a>
        <a class="btn-reporte" href="{{ route('reporte.empleado') }}"><img src="{{ asset('icon-report.svg') }}" alt="" width="30"> Generar reporte</a>

    </div>

    @if (session('mensaje'))
        <script>
            alert("{{ session('mensaje') }}");

        </script>

    @endif
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>N.</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>DUI</th>
                    <th>Telefono</th>
                    <th>Salario</th>
                    <th>Area</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $contEmpleado++ }}</td>
                        <td>{{ $empleado->user->name }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->user->email }}</td>
                        <td>{{ $empleado->dui }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->salario }}</td>
                        <td>{{ $empleado->area }}</td>

                        <td>
                            <a class="boton-edit" href="{{ route('empleado.edit', $empleado->id) }}"><img src="{{ asset('icon-edit.svg') }}" width="30" alt=""> EDITAR</a>
                            <form class="form-boton-delete" action="{{ route('empleado.destroy', $empleado->id) }}"
                                method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro de eliminar?')"><img src="{{asset('trash.svg')}}" width="26"> ELIMINAR</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $empleados->links() }}
@endsection