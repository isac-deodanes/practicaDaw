<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Iniciar sesión | Portal de Proveedores</title>

</head>


<body>

    <main class="login-container">

        <header class="login-header">

            <h1>Portal de Proveedores</h1>

            <p>
                Inicia sesión para acceder al sistema
            </p>

        </header>

        <form action="{{ route('login') }}" method="POST">

            @csrf
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input type="text" id="email" name="email" placeholder="Ingresa tu usuario" required
                    autocomplete="username" value="{{ old('email') }}">

            </div>
            <div class="form-group">

                <label for="password">
                    Contraseña
                </label>

                <input type="password" id="password" name="password" value="{{ old('password') }}"
                    placeholder="Ingresa tu contraseña" required autocomplete="current-password">

            </div>

            <button type="submit" class="login-button">
                Iniciar sesión
            </button>

        </form>
        @if ($errors->any())

            <div class="login-error">

                {{ $errors->first() }}

            </div>

        @endif

        <div class="login-options">

            <a href="#">
                ¿Olvidaste tu contraseña?
            </a>


            <div class="separator"></div>

            <div class="test-user">

                <a href="#">
                    Crear usuario de demostracion
                </a>

            </div>

        </div>


    </main>

</body>

</html>