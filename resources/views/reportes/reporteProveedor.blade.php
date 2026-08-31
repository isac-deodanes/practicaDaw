<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reporte de Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    @php
        $contProveedor = 1;
    @endphp
    <h1>Listado de proveedores</h1>

    <table>
        <thead>
            <tr>
                <th>N.</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Tipo de proveedor</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>