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

                 <a href="#" class="mobile-profile">MI PERFIL</a>
                <form id="delet-formato-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="mobile-logout" id="logout" type="submit" style="">CERRAR CESSION</button>
                </form>

            </div>
            <div id="cont-perfil">
                <div id="perfil">
                    <div class="card-perfil">
                        <div class="cont-perfil-foto">
                            <div class="perfil-foto">foto</div>
                        </div>
                        @auth
                            <div id="rol">{{ auth()->user()->rol }}</div>
                            <div id="name">Nombre:  {{ auth()->user()->name}}</div><br>
                            <div id="gmail">Email:  {{ auth()->user()->email }}</div>
                        @endauth
                        <div class="btn-cerrar-session">
                            <form id="delet-formato-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button id="logout" type="submit">Cerrar sesión</button>
                            </form>
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