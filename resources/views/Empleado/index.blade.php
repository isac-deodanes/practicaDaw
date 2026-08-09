@extends('layouts.app')

@section('content')

    <h1>Empleados</h1>
    <div class="nav-usuario">
        <a class="btn-regresar" href="{{ route('empleado.create') }}">Nuevo Empleado</a>
        <a class="btn-reporte" href="{{ route('reporte.empleado') }}">Generar reporte</a>

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
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>{{ $empleado->dui }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->salario }}</td>
                        <td>{{ $empleado->area }}</td>

                        <td>
                            <a class="boton-edit" href="{{ route('empleado.edit', $empleado->id) }}">Editar</a>
                            <form class="form-boton-delete" action="{{ route('empleado.destroy', $empleado->id) }}"
                                method="POST" style="display:inline">
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

    {{ $empleados->links() }}
@endsection