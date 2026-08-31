@extends('layouts.app')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <h1>Bienvenido al Portal de Gestión de Proveedores</h1>
    <br>
    <h3>Resumen de Datos</h3>
    <div class="card">
        <div>Empleados: {{ $totalEmpleado }}</div>
        <div>Proveedores: {{ $totalProveedores }}</div>
        <div>Productos: {{ $totalProductos }}</div>
    </div>


    <div class="grafica">
        <canvas id="grafica-dashboard"></canvas>
    </div>


    <div class="ultimo-registro">
        <h3>Últimos Registros</h3>
        <div><strong>Último Empleado Registrado:</strong> {{ $ultimoEmpleado->user->name ?? 'Sin registro' }}
            {{$ultimoEmpleado->apellido ?? ''}}
        </div>
        <div><strong>Último Proveedor Registrado:</strong> {{ $ultimoProveedor->user->name ?? 'Sin registro' }}</div>
        <div><strong>Último Producto Registrado:</strong> {{ $ultimoProducto->nombre ?? 'Sin registro' }}</div>
    </div>

    <script>
        const empleados = {{ $totalEmpleado }};
        const proveedores = {{ $totalProveedores }};
        const productos = {{ $totalProductos }};
    </script>

    <script src="{{ asset('js/grafica.js') }}"></script>
@endsection