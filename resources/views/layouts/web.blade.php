<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'CanisBoutique')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    {{-- IMPORTANTE: Usamos asset() para que no se rompa en subpáginas --}}
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/drift-zoom/drift-basic.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    {{-- TUS ESTILOS PERSONALIZADOS (Los mantengo aquí en el layout) --}}
    <style>
        :root {
            --canis-pink: #d63384;
            --canis-pink-hover: #b02a67;
            --text-dark: #333;
            --text-muted: #666;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
        }

        a {
            text-decoration: none;
            transition: 0.3s;
            color: var(--text-dark);
        }

        a:hover {
            color: var(--canis-pink);
        }

        .text-pink-custom {
            color: var(--canis-pink) !important;
        }

        .tracking-wider {
            letter-spacing: 2px;
            font-size: 0.9rem;
        }

        /* HEADER */
        .top-bar {
            background: #111;
            color: #fff;
            font-size: 13px;
        }

        .top-bar i {
            color: var(--canis-pink);
        }

        .main-header {
            padding: 20px 0;
            border-bottom: 1px solid #eee;
            background: white;
        }

        .logo h1 {
            font-size: 28px;
            font-weight: 800;
            color: #333;
            margin: 0;
        }

        .logo h1 span {
            color: var(--canis-pink);
        }

        .nav-link {
            font-weight: 500;
            color: #333 !important;
            font-size: 15px;
            margin: 0 10px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--canis-pink) !important;
        }

        .header-icons .btn {
            border: none;
            background: transparent;
            position: relative;
            font-size: 20px;
        }

        .header-icons .badge {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--canis-pink);
            border-radius: 50%;
            padding: 4px 6px;
            font-size: 10px;
        }

        /* Estilo para el botón de cuenta elegante */
        .btn-account {
            border: 2px solid #e9ecef;
            /* Borde gris suave inicial */
            background-color: transparent;
            border-radius: 50px;
            /* Forma de píldora */
            padding: 8px 24px;
            font-weight: 600;
            color: #333;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            /* Espacio entre icono y texto */
        }

        .btn-account:hover,
        .dropdown.show .btn-account {
            border-color: var(--canis-pink);
            /* Se pinta rosa al tocar */
            color: var(--canis-pink);
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(214, 51, 132, 0.15);
            /* Sombra suave */
        }

        /* Ajuste para que el menú no se pegue a los bordes en móviles */
        @media (max-width: 991px) {
            .navbar-collapse {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
        }

        /* HERO & GENERAL SECTIONS */
        .hero-section {
            position: relative;
            background-color: #f8f9fa;
            padding: 80px 0;
            overflow: hidden;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            color: #222;
        }

        .hero-subtitle {
            color: var(--canis-pink);
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hero-main-img,
        .hero-img-wrapper img {
            border: 10px solid white;
            max-width: 90%;
            width: 100%;
            max-width: 500px;
            object-fit: cover;
            aspect-ratio: 1/1;
            border-radius: 50%;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        /* BOTONES */
        .btn-pink-custom,
        .btn-canis {
            background-color: var(--canis-pink);
            border: 2px solid var(--canis-pink);
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 12px 35px;
            border-radius: 50px;
        }

        .btn-pink-custom:hover,
        .btn-canis:hover {
            background-color: white;
            color: var(--canis-pink);
            transform: translateY(-2px);
        }

        .btn-canis-outline {
            background-color: transparent;
            color: #333;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 600;
            border: 2px solid #ddd;
            transition: all 0.3s ease;
        }

        .btn-canis-outline:hover,
        .hover-pink:hover {
            border-color: var(--canis-pink) !important;
            background-color: white !important;
            color: var(--canis-pink) !important;
        }

        .btn-add-cart {
            width: 100%;
            margin-top: 15px;
            padding: 8px;
            border-radius: 8px;
            background-color: #f3f4f6;
            color: #333;
            font-weight: 600;
            border: none;
            transition: 0.2s;
        }

        .btn-add-cart:hover {
            background-color: var(--canis-pink);
            color: white;
        }

        /* CARDS */
        .floating-card {
            position: absolute;
            bottom: 10%;
            right: 10%;
            animation: float 3s ease-in-out infinite;
            z-index: 2;
        }

        .cat-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 24px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 280px;
        }

        .cat-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .cat-card:hover img {
            transform: scale(1.1);
        }

        .cat-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            padding: 30px 20px;
            color: white;
        }

        .product-card {
            background: white;
            border: 1px solid #eee;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
            position: relative;
        }

        .product-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transform: translateY(-5px);
            border-color: transparent;
        }

        .product-img-wrap {
            height: 250px;
            overflow: hidden;
            position: relative;
            background: #f9f9f9;
        }

        .product-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .badge-custom {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--canis-pink);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .product-details {
            padding: 20px;
        }

        .product-cat {
            color: #999;
            font-size: 12px;
            text-transform: uppercase;
        }

        .product-title {
            font-size: 16px;
            font-weight: 700;
            margin: 5px 0;
            color: #333;
        }

        .product-price {
            color: var(--canis-pink);
            font-weight: 800;
            font-size: 18px;
        }

        /* FOOTER */
        .footer-dark {
            background-color: #1a1a1a;
            color: #aaa;
            padding: 60px 0 20px;
        }

        .footer-title {
            color: white;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-dark a {
            color: #aaa;
        }

        .footer-dark a:hover {
            color: var(--canis-pink);
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #333;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: white;
        }

        .social-btn:hover {
            background: var(--canis-pink);
            color: white;
        }

        /* ANIMACIONES */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="top-bar sticky-top">
        <div class="top-bar py-2 d-none d-lg-block">
            <div class="container d-flex justify-content-between align-items-center">
                <div><i class="bi bi-telephone-fill me-2"></i> ¿Necesitas ayuda? Llámanos: <strong>+54 9 11
                        8367-2638</strong></div>
                <div class="d-flex gap-4">
                    <span><i class="bi bi-truck me-1"></i> Envíos Gratis > $50.000</span>
                    <span><i class="bi bi-arrow-repeat me-1"></i> Garantía de Satisfacción</span>
                </div>
                <div><span class="me-3">Moneda: <strong>ARS $</strong></span><span>Idioma: <strong>ES</strong></span>
                </div>
            </div>
        </div>

        <div class="main-header sticky-top bg-white border-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid px-0">

                        <a class="navbar-brand logo d-flex align-items-center gap-2" href="{{ route('web.index') }}">
                            <i class="bi bi-paw-fill fs-3" style="color: var(--canis-pink);"></i>
                            <h1>Canis<span>Boutique</span></h1>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNav">

                            <ul class="navbar-nav mx-auto text-center mb-3 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('web.index') ? 'active' : '' }}"
                                        href="{{ route('web.index') }}">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('tienda.*') ? 'active' : '' }}"
                                        href="{{ route('tienda.index') }}">Tienda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#servicios">Peluquería</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('web.contacto') ? 'active' : '' }}"
                                        href="{{ route('web.contacto') }}">Contacto</a>
                                </li>
                            </ul>

                            <div
                                class="header-icons d-flex align-items-center justify-content-center justify-content-lg-end gap-3">

                                <div class="dropdown">
                                    <button class="btn btn-account dropdown-toggle" type="button" id="dropdownAccount"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        @auth
                                            <i class="bi bi-person-circle fs-5"></i>
                                            <span class="small">{{ Auth::user()->name }}</span>
                                        @else
                                            <i class="bi bi-person fs-5"></i>
                                            <span class="small">Cuenta</span>
                                        @endauth
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 rounded-3 overflow-hidden"
                                        aria-labelledby="dropdownAccount">
                                        @guest
                                            <li>
                                                <a class="dropdown-item py-2" href="{{ route('login') }}">
                                                    <i class="bi bi-box-arrow-in-right me-2 text-pink-custom"></i> Iniciar
                                                    Sesión
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item py-2" href="{{ route('register') }}">
                                                    <i class="bi bi-person-plus me-2 text-pink-custom"></i> Registrarse
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <h6 class="dropdown-header bg-light py-2">Hola, {{ Auth::user()->name }}
                                                </h6>
                                            </li>
                                            <li>
                                                <a class="dropdown-item py-2" href="{{ route('admin.index') }}">
                                                    <i class="bi bi-speedometer2 me-2 text-pink-custom"></i> Mi Panel
                                                </a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider my-1">
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item py-2 text-danger">
                                                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                                                    </button>
                                                </form>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>

                                <a href="{{ route('tienda.cart') }}"
                                    class="btn position-relative p-2 text-dark hover-pink transition-all">
                                    <i class="bi bi-cart3 fs-4"></i>
                                    <span
                                        class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle border border-light p-1"
                                        style="font-size: 0.65rem;">
                                        0
                                    </span>
                                </a>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">
        {{-- AQUÍ SE INYECTA EL CONTENIDO --}}
        @yield('content')
    </main>

    <footer class="footer-dark">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <h4 class="footer-title">CanisBoutique</h4>
                    <p class="mb-4">Tu tienda de confianza para productos premium y servicios de peluquería canina.</p>
                    <div>
                        <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-title text-white fs-6">Tienda</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="#">Alimentos</a></li>
                        <li><a href="#">Accesorios</a></li>
                        <li><a href="#">Juguetes</a></li>
                        <li><a href="#">Ofertas</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-title text-white fs-6">Servicios</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="#">Peluquería</a></li>
                        <li><a href="#">Baño Terapéutico</a></li>
                        <li><a href="#">Corte de Raza</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title text-white fs-6">Contacto</h5>
                    <ul class="list-unstyled d-flex flex-column gap-3">
                        <li class="d-flex gap-3"><i class="bi bi-geo-alt text-pink-custom"></i><span>Vera 1450, Villa
                                Crespo, CABA</span></li>
                        <li class="d-flex gap-3"><i class="bi bi-telephone text-pink-custom"></i><span>+54 9 11
                                8367-2638</span></li>
                        <li class="d-flex gap-3"><i
                                class="bi bi-envelope text-pink-custom"></i><span>contacto@canisboutique.com</span></li>
                    </ul>
                </div>
            </div>
            <hr class="my-5 border-secondary">
            <div class="text-center small">
                <p class="mb-0">&copy; {{ date('Y') }} <strong>CanisBoutique</strong>. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/drift-zoom/Drift.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>