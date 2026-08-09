<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de empleados</title>
    <link rel="stylesheet" href="{{ asset('css/estilos-globales.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="brand">
                <a href="{{ route('inicio.index') }}">
                    <img src="{{ asset('laravel.svg') }}" alt="img" width="45">
                </a>
            </div>
            <button class="menu-toggle" id="menuToggle" aria-label="Abrir menu">
                ☰
            </button>

            <div class="nav-menu" id="navMenu">
                <a href="{{ route('inicio.index') }}">INICIO</a>
                <a href="{{ route('empleado.index') }}">EMPLEADOS</a>
                <a href="{{ route('producto.index') }}">PRODUCTOS</a>
                <a href="{{ route('proveedor.index') }}">PROVEEDORES</a>
                <!-- Perfil -->
                <div id="" class="mobile-profile">
                    MI PERFIL
                     {{-- <div class="card-perfil">
                        <div class="cont-perfil-foto">
                            <div class="perfil-foto">foto</div>
                        </div>
                        <div id="rol">Administrador</div>
                        <div id="name">Nombre:</div>
                        <div id="gmail">Email:</div>
                        <div class="btn-cerrar-session">
                            <button id="logout">Cerrar session</button>
                        </div>

                    </div> --}}
                </div>
                <a href="#" class="mobile-logout">
                    CERRAR SESION
                </a>
            </div>
            <div id="cont-perfil">
                <div id="perfil">
                    <div class="card-perfil">
                        <div class="cont-perfil-foto">
                            <div class="perfil-foto">foto</div>
                        </div>
                        <div id="rol">Administrador</div>
                        <div id="name">Nombre: {{Auth::user()}}</div>
                        <div id="gmail">Email:</div>
                        <div class="btn-cerrar-session">
                            <button id="logout">Cerrar session</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2026 Portal de proveedores. Todos los derechos reservados.</p>
    </footer>

    <script src="{{asset('js/perfil.js') }}"></script>
    <script src="{{asset('js/menu.js') }}"></script>
</body>

</html>