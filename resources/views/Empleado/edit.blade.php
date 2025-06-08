

@extends('layouts.app')

@section('content')

    <div class="nav-2">
        <a href="{{ route('empleado.index') }}">Volver al listado</a>
        
    </div>
    <h1>Editar Empleado</h1>

    <form action="{{ route('empleado.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $empleado->nombre }}" required pattern="[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,50}"><br>

        <label>Apellido:</label>
        <input type="text" name="apellido" value="{{ $empleado->apellido }}" required
            pattern="[A-Za-záéíóúÁÉÍÓÚñÑ ]{2,50}"><br>

        <label>Correo:</label>
        <input type="email" name="correo" value="{{ $empleado->correo }}" required><br>

        <label>DUI:</label>
        <input type="text" name="dui" value="{{ $empleado->dui }}" required pattern="^\d{8}-\d{1}$"><br>


        <label for="dui">Telefono:</label>
        <input type="num" id="telefono" name="telefono" required
            value="{{ isset($empleado->telefono) ? $empleado->telefono : '' }}"><br>

        <label for="dui">Salario:</label>
        <input type="num" id="salario" name="salario" required
            value="{{ isset($empleado->salario) ? $empleado->salario : '' }}"><br>

        <select name="area" id="area" required>
            <option value="Gerencia" {{ isset($empleado) && $empleado->area == 'Gerencia' ? 'selected' : '' }}>Gerencia
            </option>
            <option value="Supervisor" {{ isset($empleado) && $empleado->area == 'supervisor' ? 'selected' : '' }}>Supervisor
            </option>
            <option value="Ventas" {{ isset($empleado) && $empleado->area == 'ventas' ? 'selected' : '' }}>Ventas</option>

        </select>
    

        <button type="submit">Actualizar</button>
    </form>

    <!-- <a href="{{ route('empleado.index') }}">Volver al listado</a> -->
@endsection