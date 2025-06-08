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
            height: 100vh;
            margin: 0;
            background-color: #1e272e;
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
            padding-left: 23px;
        }

        button {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
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
            background-color: rgba(0, 0, 0, 0.3);
            align-items: center;
            justify-content: space-around;
            width: 100%;
            height: 12vh;
              margin-bottom: 50px;
        }

        /* FORMUALARIo create */
        .nav-2 {
            display: flex;
            background-color: rgba(0, 0, 0, 0.3);
            align-items: center;
            justify-content:flex-start;
            width: 100%;
            height: 12vh;
            margin-bottom: 20px;
        }
         form {
            background: #fff;
            /* padding: 20px; */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 45%;
        }
        .form-boton-delete{
             background: transparent;
            padding: 0px;
            border-radius: 0px;
            box-shadow:0px;
            text-align: center;
            width:0;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #9a9c9c;
        }

        input, select{
            width: 90%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        select{
            margin-bottom: 20px;
        }

       


    </style>
</head>

<body>

    @yield('content')

</body>

</html>