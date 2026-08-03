<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de empleados</title>
    <style>
        body {
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
            align-items: center;
            margin: 0;
            background-color: rgb(12, 12, 12);
            /* Color oscuro profesional */
            font-family: Arial, sans-serif;
            color: #ecf0f1;
        }

        h1 {
            /* height: 20vh; */
        }

        .container {
            width: 90%;
            text-align: center;
            background: #2f3640;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        table {
            width: 75%;
            border-collapse: collapse;
            /* margin: auto; */
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            color: #2c3e50;
        }

        th {
            background-color: rgb(106, 171, 255);
            /* Nuevo color para encabezados */
            color: white;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: rgba(120, 194, 255, 0.18);
        }

        a {
            text-decoration: none;
            color: rgb(210 210 210);
            font-weight: bold;
            padding: 0px 30px;
        }

        button {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            margin: 35px 10px 10px;
            cursor: pointer;
        }

        .boton-edit {
            background-color: rgba(1, 81, 255, 0.4);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e55039;
        }

        .boton-edit:hover {
            background-color: rgba(21, 77, 200, 0.63);

        }

        .nav {
            display: flex;
            background-color: rgb(12, 12, 12);

            align-items: center;
            justify-content: flex-end;
            width: 100%;
            padding: 50px 0px;

            margin-bottom: 50px;
        }

        .nav-usuario {
            display: flex;
            justify-content: space-between;
            width: 95%;
            margin-bottom: 55px;
        }

        form {
            background: #141313;
            padding: 47px;
            border-radius: 10px;
            box-shadow: 5px 7px 8px 2px rgb(195 195 195 / 10%);
            text-align: left;
            width: 45%;
        }

        .form-boton-delete {
            background: transparent;
            padding: 0px;
            border-radius: 0px;
            box-shadow: 0px;
            text-align: center;
            width: 0;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #9a9c9c;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            margin-bottom: 20px;
        }

        main {
            padding: 20px;
            width: 90%;
            /* height: 58vh; */
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .btn-regresar,
        .btn-reporte {
            display: inline-block;
            padding-left: 0px;
            border-radius: 5px;
            padding: 10px;

        }

        .btn-regresar {
            background-color: rgb(24, 93, 255);
        }

        .btn-reporte {
            background-color: red;
        }

        footer {
            display: flex;
            background-color: rgb(12, 12, 12);

            align-items: center;
            justify-content: center;
            width: 100%;
            margin-top: 300px;
            padding: 50px 0px;
        }
    </style>
</head>

<body>
    <nav class="nav">
        <a href="{{ route('prueba') }}">Inicio</a>
        <a href="{{ route('empleado.index') }}">Empleados</a>
        <a href="{{ route('producto.index') }}">Productos</a>
        <a href="{{ route('proveedor.index') }}">Proveedores</a>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2026 Portal de proveedores. Todos los derechos reservados.</p>
    </footer>

</body>

</html>