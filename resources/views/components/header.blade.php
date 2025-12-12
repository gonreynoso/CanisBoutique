<header id="dynamic-header" class="fixed-top w-100 z-3">

    {{-- MAIN NAV (Ahora contiene todo) --}}
    <nav id="main-nav" class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3">
        <div class="container">

            {{-- 1. LOGO --}}
            <a class="navbar-brand me-4" href="/">
                <img src="{{ asset('images/logo_Canis_sin_fondo.png') }}" alt="Logo" class="img-fluid"
                    style="width: 80px; height: 80px; object-fit: contain;">
            </a>

            {{-- 2. GRUPO DERECHA: CTA + ICONO USUARIO + HAMBURGUESA --}}
            {{-- 'order-md-last' asegura que esto siempre esté a la derecha --}}
            <div class="d-flex align-items-center gap-3 order-md-last">

                {{-- A. Botón CTA (Reservar Turno) --}}
                {{-- En móviles pequeños ocultamos el texto si falta espacio, o lo dejamos --}}
                <a href="#contacto" class="btn text-white fw-bold shadow-sm d-none d-sm-block"
                    style="background-color: #d63384; border-color: #d63384; font-size: 0.9rem;">
                    Reservar turno
                </a>

                {{-- B. ÍCONO DE SESIÓN (Dropdown) --}}
                <div class="dropdown">
                    <a href="#"
                        class="text-dark fs-4 d-flex align-items-center justify-content-center text-decoration-none"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                        style="width: 40px; height: 40px; border-radius: 50%; transition: background 0.2s;">
                        <i class="bi bi-person-circle"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2"
                        aria-labelledby="userDropdown">

                        @if (Route::has('login'))
                            @auth
                                {{-- ESTADO: LOGUEADO --}}
                                <li class="px-3 py-2 border-bottom">
                                    <span class="small text-muted d-block">Hola,</span>
                                    <span class="fw-bold text-dark">{{ Auth::user()->name }}</span>
                                </li>

                                {{-- <li><a class="dropdown-item py-2" href="#">Perfil</a></li> --}}

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            @else
                                {{-- ESTADO: VISITANTE --}}
                                <li><span class="dropdown-header">Mi Cuenta</span></li>
                                <li>
                                    <a class="dropdown-item py-2" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                                    </a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a class="dropdown-item py-2" href="{{ route('register') }}">
                                            <i class="bi bi-person-plus me-2"></i>Registrarse
                                        </a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>

                {{-- C. Botón Hamburguesa (Móvil) --}}
                <button class="navbar-toggler border-0 p-0 ms-1" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            {{-- 3. MENÚ DE ENLACES (Centro) --}}
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto mb-2 mb-md-0 text-center">

                    {{-- CTA visible SOLO en móvil (ya que arriba lo oculté con d-none d-sm-block para no saturar) --}}
                    <li class="nav-item d-block d-sm-none my-2">
                        <a href="#contacto" class="btn btn-primary w-100 fw-bold"
                            style="background-color: #d63384; border-color: #d63384;">
                            Reservar turno
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium custom-hover-pink px-3" href="#Tienda">Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium custom-hover-pink px-3" href="#peluqueria">Peluquería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium custom-hover-pink px-3" href="#contacto">Contacto</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</header>

<style>
    /* Efecto Hover para ícono de usuario */
    #userDropdown:hover {
        background-color: #f8f9fa;
        /* Gris muy suave al pasar el mouse */
        color: #d63384 !important;
        /* Se pone rosa */
    }

    .custom-hover-pink:hover {
        color: #d63384 !important;
        transition: color 0.3s ease;
    }

    /* Padding para que el contenido no quede oculto bajo el header fixed */
    body {
        padding-top: 110px;
    }
</style>