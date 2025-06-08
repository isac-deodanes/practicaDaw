<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <title>Reporte de Empleados</title> 
    <style> 
        body { font-family: Arial, sans-serif; font-size: 12px; } 
        table { width: 100%; border-collapse: collapse; margin-top: 20px; } 
        th, td { border: 1px solid #333; padding: 6px; text-align: left; } 
        th { background-color: #f2f2f2; } 
        h1 { text-align: center; } 
    </style> 
</head> 
<body> 
    <h1>Listado de Empleados</h1> 
 
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

            </tr>
        @endforeach
        </tbody>
    </table>
</body> 
</html> 