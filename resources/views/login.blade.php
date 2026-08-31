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

        <div class="demo-credentials" style="background: #f3f4f6; border: 1px solid #d1d5db; border-radius: 10px; padding: 12px; margin-bottom: 18px; font-size: 0.95rem; color: #1f2937;">
            <strong>Usuario demo:</strong><br>
            Email: <b>admin@demo.com</b><br>
            Contraseña: <b>12345678</b>
        </div>

        <form action="{{ route('login.process') }}" method="POST">

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

           

        </div>


    </main>

</body>

</html>