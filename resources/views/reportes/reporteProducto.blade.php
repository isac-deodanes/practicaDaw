<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <title>Reporte de Productos</title> 
    <style> 
        body { font-family: Arial, sans-serif; font-size: 12px; } 
        table { width: 100%; border-collapse: collapse; margin-top: 20px; } 
        th, td { border: 1px solid #333; padding: 6px; text-align: left; } 
        th { background-color: #f2f2f2; } 
        h1 { text-align: center; } 
    </style> 
</head> 
<body> 
    <h1>Listado de Productos</h1> 
 
   <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>marca</th>
               
            </tr>
        </thead>
        <tbody>
        @foreach ($producto as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->marca }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body> 
</html>