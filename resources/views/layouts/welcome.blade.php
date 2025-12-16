<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Inicio - CanisBoutique</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/drift-zoom/drift-basic.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>
<style>
    /* =========================================
   1. VARIABLES GLOBALES & CONFIGURACIÓN
   ========================================= */
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

    /* Utilidades de Tipografía */
    .text-pink-custom {
        color: var(--canis-pink) !important;
    }

    .tracking-wider {
        letter-spacing: 2px;
        font-size: 0.9rem;
    }

    /* =========================================
   2. HEADER & TOP BAR
   ========================================= */
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

    /* =========================================
   3. HERO SECTION
   ========================================= */
    .hero-section {
        position: relative;
        background-color: #f8f9fa;
        /* Fondo gris muy suave */
        padding: 80px 0;
        overflow: hidden;
        /* Evita scroll horizontal si hay animaciones */
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

    /* Estilos de Imagen Hero (Soporta ambas clases que tenías) */
    .hero-main-img,
    .hero-img-wrapper img {
        border: 10px solid white;
        /* Marco blanco grueso */
        max-width: 90%;
        width: 100%;
        /* Asegura respuesta en móviles */
        max-width: 500px;
        /* Límite para pantallas grandes */
        object-fit: cover;
        aspect-ratio: 1/1;
        /* Mantiene la imagen cuadrada/circular */
        border-radius: 50%;
        /* Círculo */
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* =========================================
   4. BOTONES (Variantes fusionadas)
   ========================================= */

    /* Estilo 1: Botón Principal (Canis Custom) */
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
        /* Pequeña elevación */
    }

    /* Estilo 2: Botón Outline / Secundario */
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

    /* =========================================
   5. TARJETAS (Cards & Categories)
   ========================================= */

    /* Tarjeta Flotante (Animada) */
    .floating-card {
        position: absolute;
        bottom: 10%;
        right: 10%;
        animation: float 3s ease-in-out infinite;
        z-index: 2;
    }

    /* Tarjeta de Categoría */
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

    /* Tarjeta de Producto */
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

    /* =========================================
   6. FOOTER
   ========================================= */
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

    /* =========================================
   7. ANIMACIONES & RESPONSIVE
   ========================================= */

    /* Animación suave de flotación */
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

    /* Ajustes para móviles */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
    }
</style>

<body class="index-page">



    <header id="header" class="top-bar sticky-top">


        <!-- Top Bar -->
        <div class="top-bar py-2 d-none d-lg-block">
            <div class="container d-flex justify-content-between align-items-center">
                <div>
                    <i class="bi bi-telephone-fill me-2"></i> ¿Necesitas ayuda? Llámanos: <strong>+54 9 11
                        8367-2638</strong>
                </div>
                <div class="d-flex gap-4">
                    <span><i class="bi bi-truck me-1"></i> Envíos Gratis > $50.000</span>
                    <span><i class="bi bi-arrow-repeat me-1"></i> Garantía de Satisfacción</span>
                </div>
                <div>
                    <span class="me-3">Moneda: <strong>ARS $</strong></span>
                    <span>Idioma: <strong>ES</strong></span>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <header class="main-header sticky-top">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid px-0 ">

                        <a class="navbar-brand logo d-flex align-items-center gap-2" href="#">
                            <i class="bi bi-paw-fill fs-3" style="color: var(--canis-pink);"></i>
                            <h1>Canis<span>Boutique</span></h1>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNav">

                            <ul class="navbar-nav text-center">
                                <li class="nav-item"><a class="nav-link active"
                                        href="{{ route('web.index') }}">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="#productos">Tienda</a></li>
                                <li class="nav-item"><a class="nav-link" href="#servicios">Peluquería</a></li>
                                <li class="nav-item"><a class="nav-link" href="#nosotros">Nosotros</a></li>
                                <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                            </ul>

                            <div
                                class="header-icons d-flex align-items-center justify-content-center gap-3 mt-3 mt-lg-0">

                                {{-- Botón de Búsqueda --}}
                                <button class="btn"><i class="bi bi-search"></i></button>

                                {{-- Dropdown de Cuenta --}}
                                <div class="dropdown">
                                    <button
                                        class="btn btn-canis-outline dropdown-toggle d-flex align-items-center gap-2"
                                        type="button" id="dropdownAccount" data-bs-toggle="dropdown"
                                        aria-expanded="false">

                                        @auth
                                            <i class="bi bi-person-circle"></i>
                                            <span class="small fw-bold">{{ Auth::user()->name }}</span>
                                        @else
                                            <i class="bi bi-person"></i>
                                            <span class="small fw-bold">Cuenta</span>
                                        @endauth
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end shadow border-0"
                                        aria-labelledby="dropdownAccount">
                                        @guest
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2"
                                                    href="{{ route('login') }}">
                                                    <i class="bi bi-box-arrow-in-right text-pink-custom"></i> Iniciar Sesión
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2"
                                                    href="{{ route('register') }}">
                                                    <i class="bi bi-person-plus text-pink-custom"></i> Registrarse
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <h6 class="dropdown-header">Hola, {{ Auth::user()->name }}</h6>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2"
                                                    href="{{ route('admin.index') }}">
                                                    <i class="bi bi-speedometer2 text-pink-custom"></i> Mi Panel
                                                </a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="dropdown-item d-flex align-items-center gap-2 text-danger">
                                                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                                    </button>
                                                </form>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>

                                {{-- Botón del Carrito --}}
                                <button class="btn position-relative">
                                    <i class="bi bi-cart3 fs-5"></i>
                                    <span class="badge"></span>
                                </button>

                            </div>
                            {{-- Fin header-icons --}}

                        </div>
                        {{-- Fin collapse navbar-collapse --}}

                    </div>
                </nav>
            </div>
        </header>



    </header>



    <main class="main">

        <!-- Hero Section -->
        <section class="hero-section d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center gy-5">

                    {{-- Columna Izquierda: Texto --}}
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div data-aos="fade-up">
                            <span class="hero-subtitle">Bienvenido a CanisBoutique</span>
                            <h1 class="hero-title my-3">Amor, Estilo y <br>Cuidado para tu compañero</h1>
                            <p class="lead text-muted mb-4">
                                Encuentra los mejores accesorios, alimentos premium y reserva un día de spa inolvidable
                                para tu mejor amigo. Porque ellos se merecen lo mejor.
                            </p>

                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('tienda.index') }}" class="btn-canis shadow-sm">
                                    <i class="bi bi-bag-heart me-2"></i> Ver Tienda
                                </a>
                                <a href="#servicios" class="btn-canis-outline">
                                    <i class="bi bi-calendar-check me-2"></i> Reservar Turno
                                </a>
                            </div>

                            <div class="d-flex gap-4 mt-5 border-top pt-4">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-shield-check fs-2" style="color: var(--canis-pink);"></i>
                                    <span class="lh-sm small fw-bold">Calidad<br>Garantizada</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-truck fs-2" style="color: var(--canis-pink);"></i>
                                    <span class="lh-sm small fw-bold">Envíos<br>Rápidos</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-heart-pulse fs-2" style="color: var(--canis-pink);"></i>
                                    <span class="lh-sm small fw-bold">Cuidado<br>Veterinario</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Columna Derecha: Imagen --}}
                    <div class="col-lg-6 order-1 order-lg-2 text-center position-relative">
                        <div class="image-wrapper">
                            <img src="{{ asset('images/pet-grooming-at-home-scaled-1.jpg') }}" alt="Canis Hero"
                                class="img-fluid rounded-circle shadow-lg hero-main-img">

                            <div
                                class="floating-card bg-white p-3 rounded-4 shadow d-none d-md-flex align-items-center gap-3">
                                <div class="icon-box bg-light rounded-circle p-2 d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;">
                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                </div>
                                <div class="text-start">
                                    <h6 class="mb-0 fw-bold">5 Estrellas</h6>
                                    <small class="text-muted">Clientes Felices</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Promo Cards Section -->
        <section id="promo-cards" class="promo-cards section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">

                    {{-- CATEGORÍA DESTACADA: PELUQUERÍA --}}
                    <div class="col-lg-6">
                        <div class="category-featured" data-aos="fade-right" data-aos-delay="200">
                            <div class="category-image">
                                {{-- Imagen de un perrito en spa/baño --}}
                                <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?q=80&w=1200&auto=format&fit=crop"
                                    alt="Peluquería Canina Premium" class="img-fluid">
                            </div>
                            <div class="category-content">
                                <span class="category-tag">Servicio Estrella</span>
                                <h2>Spa & Peluquería Canina</h2>
                                <p>Dale a tu mejor amigo el cuidado que se merece con nuestros estilistas profesionales.
                                    Baños relajantes, cortes de raza y mimos garantizados.</p>
                                <a href="#servicios" class="btn-shop">Ver Servicios <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- GRID DE CATEGORÍAS SECUNDARIAS --}}
                    <div class="col-lg-6">
                        <div class="row gy-4">

                            {{-- ALIMENTACIÓN --}}
                            <div class="col-xl-6">
                                <div class="category-card cat-men" data-aos="fade-up" data-aos-delay="300">
                                    <div class="category-image">
                                        <img src="https://images.unsplash.com/photo-1589924691195-41432c84c161?q=80&w=600&auto=format&fit=crop"
                                            alt="Alimento Premium" class="img-fluid">
                                    </div>
                                    <div class="category-content">
                                        <h4>Nutrición</h4>
                                        <p>Alimentos Premium</p>
                                        <a href="#" class="card-link">Comprar Ahora <i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            {{-- JUGUETES --}}
                            <div class="col-xl-6">
                                <div class="category-card cat-kids" data-aos="fade-up" data-aos-delay="400">
                                    <div class="category-image">
                                        <img src="https://images.unsplash.com/photo-1576201836106-db1758fd1c97?q=80&w=600&auto=format&fit=crop"
                                            alt="Juguetes para perros" class="img-fluid">
                                    </div>
                                    <div class="category-content">
                                        <h4>Diversión</h4>
                                        <p>Juguetes y Mordillos</p>
                                        <a href="#" class="card-link">Explorar <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            {{-- ESTÉTICA / SHAMPOOS --}}
                            <div class="col-xl-6">
                                <div class="category-card cat-cosmetics" data-aos="fade-up" data-aos-delay="500">
                                    <div class="category-image">
                                        <img src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?q=80&w=600&auto=format&fit=crop"
                                            alt="Higiene para mascotas" class="img-fluid">
                                    </div>
                                    <div class="category-content">
                                        <h4>Higiene</h4>
                                        <p>Shampoos y Colonias</p>
                                        <a href="#" class="card-link">Ver Catálogo <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            {{-- ACCESORIOS --}}
                            <div class="col-xl-6">
                                <div class="category-card cat-accessories" data-aos="fade-up" data-aos-delay="600">
                                    <div class="category-image">
                                        <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?q=80&w=600&auto=format&fit=crop"
                                            alt="Accesorios para mascotas" class="img-fluid">
                                    </div>
                                    <div class="category-content">
                                        <h4>Accesorios</h4>
                                        <p>Paseo y Descanso</p>
                                        <a href="#" class="card-link">Ver Más <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <x-grooming />

        <section id="best-sellers" class="best-sellers section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Favoritos de la Comunidad</h2>
                <p>Los productos más elegidos por nuestros clientes para el bienestar y estilo de sus mejores amigos.
                </p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5">

                    <div class="col-lg-3 col-md-6">
                        <div class="product-item">
                            <div class="product-image">
                                <div class="product-badge">Limitado</div>
                                <img src="https://images.unsplash.com/photo-1589924691195-41432c84c161?q=80&w=600&auto=format&fit=crop"
                                    alt="Alimento Premium" class="img-fluid" loading="lazy">
                                <div class="product-actions">
                                    <button class="action-btn wishlist-btn">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <button class="action-btn compare-btn">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </button>
                                    <button class="action-btn quickview-btn">
                                        <i class="bi bi-zoom-in"></i>
                                    </button>
                                </div>
                                <button class="cart-btn">Seleccionar Opciones</button>
                            </div>
                            <div class="product-info">
                                <div class="product-category">Nutrición Premium</div>
                                <h4 class="product-name"><a href="#">Royal Canin - Adulto Mini</a></h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <span class="rating-count">(24)</span>
                                </div>
                                <div class="product-price">$45.500</div>
                                <div class="color-swatches">
                                    <span class="swatch active" title="1kg" style="background-color: #f3f4f6;"></span>
                                    <span class="swatch" title="3kg" style="background-color: #e5e7eb;"></span>
                                    <span class="swatch" title="7kg" style="background-color: #d1d5db;"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-item">
                            <div class="product-image">
                                <div class="product-badge sale-badge">25% OFF</div>
                                <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?q=80&w=600&auto=format&fit=crop"
                                    alt="Pretal de Cuero" class="img-fluid" loading="lazy">
                                <div class="product-actions">
                                    <button class="action-btn wishlist-btn">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <button class="action-btn compare-btn">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </button>
                                    <button class="action-btn quickview-btn">
                                        <i class="bi bi-zoom-in"></i>
                                    </button>
                                </div>
                                <button class="cart-btn">Añadir al Carrito</button>
                            </div>
                            <div class="product-info">
                                <div class="product-category">Paseo y Estilo</div>
                                <h4 class="product-name"><a href="#">Arnés de Cuero Artesanal</a></h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                    <span class="rating-count">(38)</span>
                                </div>
                                <div class="product-price">
                                    <span class="old-price">$18.200</span>
                                    <span class="current-price">$14.500</span>
                                </div>
                                <div class="color-swatches">
                                    <span class="swatch active" title="Marrón"
                                        style="background-color: #634832;"></span>
                                    <span class="swatch" title="Negro" style="background-color: #000000;"></span>
                                    <span class="swatch" title="Rojo" style="background-color: #8B0000;"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-item">
                            <div class="product-image">
                                <img src="https://images.unsplash.com/photo-1576201836106-db1758fd1c97?q=80&w=600&auto=format&fit=crop"
                                    alt="Mordillo Kong" class="img-fluid" loading="lazy">
                                <div class="product-actions">
                                    <button class="action-btn wishlist-btn">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <button class="action-btn compare-btn">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </button>
                                    <button class="action-btn quickview-btn">
                                        <i class="bi bi-zoom-in"></i>
                                    </button>
                                </div>
                                <button class="cart-btn">Añadir al Carrito</button>
                            </div>
                            <div class="product-info">
                                <div class="product-category">Juguetes</div>
                                <h4 class="product-name"><a href="#">Pelota de Caucho Irrompible</a></h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <span class="rating-count">(12)</span>
                                </div>
                                <div class="product-price">$8.900</div>
                                <div class="color-swatches">
                                    <span class="swatch active" title="Naranja"
                                        style="background-color: #ff6600;"></span>
                                    <span class="swatch" title="Azul" style="background-color: #0000ff;"></span>
                                    <span class="swatch" title="Verde" style="background-color: #008000;"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-item">
                            <div class="product-image">
                                <div class="product-badge trending-badge">Tendencia</div>
                                <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?q=80&w=600&auto=format&fit=crop"
                                    alt="Cama para perro" class="img-fluid" loading="lazy">
                                <div class="product-actions">
                                    <button class="action-btn wishlist-btn active">
                                        <i class="bi bi-heart-fill"></i>
                                    </button>
                                    <button class="action-btn compare-btn">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </button>
                                    <button class="action-btn quickview-btn">
                                        <i class="bi bi-zoom-in"></i>
                                    </button>
                                </div>
                                <button class="cart-btn">Añadir al Carrito</button>
                            </div>
                            <div class="product-info">
                                <div class="product-category">Descanso</div>
                                <h4 class="product-name"><a href="#">Cama Ortopédica "Nube"</a></h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="rating-count">(56)</span>
                                </div>
                                <div class="product-price">$32.500</div>
                                <div class="color-swatches">
                                    <span class="swatch" title="Gris" style="background-color: #808080;"></span>
                                    <span class="swatch active" title="Rosa" style="background-color: #ffc0cb;"></span>
                                    <span class="swatch" title="Crema" style="background-color: #fffdd0;"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>```


        {{-- ==================== 6. CALL TO ACTION (Reserva) ==================== --}}
        <section class="py-5 text-white text-center"
            style="background: linear-gradient(rgba(214, 51, 132, 0.9), rgba(214, 51, 132, 0.8)), url('{{ asset('images/pet-grooming-at-home-scaled-1.jpg') }}') center/cover fixed;">
            <div class="container py-4">
                <h2 class="text-white display-5 fw-bold mb-3">¡Dale a tu amigo un día de Spa!</h2>
                <p class="lead text-white mb-4 mx-auto" style="max-width: 700px;">
                    Nuestros expertos estilistas caninos están listos para dejar a tu compañero radiante.
                    Baño, corte, limado de uñas y mucho amor.
                </p>
                <a href="{{ route('web.reservar') }}" class="btn btn-light btn-lg rounded-pill fw-bold px-5 py-3"
                    style="color: var(--canis-pink);">
                    Reservar Cita Ahora
                </a>
            </div>
        </section>

        <section id="call-to-action" class="call-to-action section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="main-content text-center" data-aos="zoom-in" data-aos-delay="200">

                            {{-- Badge de Oferta --}}
                            <div class="offer-badge" data-aos="fade-down" data-aos-delay="250">
                                <span class="limited-time">Tiempo Limitado</span>
                                <span class="offer-text">30% OFF</span>
                            </div>

                            <h2 data-aos="fade-up" data-aos-delay="300">¡Gran Oferta de Verano en CanisBoutique!</h2>

                            <p class="subtitle" data-aos="fade-up" data-aos-delay="350">
                                No dejes pasar nuestra mayor liquidación de temporada. Accesorios seleccionados y mimos
                                premium
                                a precios imbatibles. ¡Solo por las próximas 48 horas!
                            </p>

                            {{-- Contador (Asegúrate que la fecha sea futura para que se vea activo) --}}
                            <div class="countdown-wrapper" data-aos="fade-up" data-aos-delay="400">
                                <div class="countdown d-flex justify-content-center" data-count="2025/12/31">
                                    <div>
                                        <h3 class="count-days"></h3>
                                        <h4>Días</h4>
                                    </div>
                                    <div>
                                        <h3 class="count-hours"></h3>
                                        <h4>Horas</h4>
                                    </div>
                                    <div>
                                        <h3 class="count-minutes"></h3>
                                        <h4>Minutos</h4>
                                    </div>
                                    <div>
                                        <h3 class="count-seconds"></h3>
                                        <h4>Segundos</h4>
                                    </div>
                                </div>
                            </div>

                            {{-- Botones de Acción --}}
                            <div class="action-buttons" data-aos="fade-up" data-aos-delay="450">
                                <a href="#productos" class="btn-shop-now">Comprar Ahora</a>
                                <a href="#" class="btn-view-deals">Ver Ofertas del Mes</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>```

        <x-contact />





    </main>

    <footer class="footer-dark">
        <div class="container">
            <div class="row gy-4">

                {{-- Columna 1: Info --}}
                <div class="col-lg-4 col-md-6">
                    <h4 class="footer-title">CanisBoutique</h4>
                    <p class="mb-4">Tu tienda de confianza para productos premium y servicios de peluquería canina. Amor
                        y cuidado en cada detalle para tu mejor amigo.</p>
                    <div>
                        <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                {{-- Columna 2: Links Rápidos --}}
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-title text-white fs-6">Tienda</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="#">Alimentos</a></li>
                        <li><a href="#">Accesorios</a></li>
                        <li><a href="#">Juguetes</a></li>
                        <li><a href="#">Ofertas</a></li>
                    </ul>
                </div>

                {{-- Columna 3: Servicios --}}
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-title text-white fs-6">Servicios</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="#">Peluquería</a></li>
                        <li><a href="#">Baño Terapéutico</a></li>
                        <li><a href="#">Corte de Raza</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                    </ul>
                </div>

                {{-- Columna 4: Contacto --}}
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title text-white fs-6">Contacto</h5>
                    <ul class="list-unstyled d-flex flex-column gap-3">
                        <li class="d-flex gap-3">
                            <i class="bi bi-geo-alt text-pink-custom"></i>
                            <span>Vera 1450, Villa Crespo, CABA</span>
                        </li>
                        <li class="d-flex gap-3">
                            <i class="bi bi-telephone text-pink-custom"></i>
                            <span>+54 9 11 8367-2638</span>
                        </li>
                        <li class="d-flex gap-3">
                            <i class="bi bi-envelope text-pink-custom"></i>
                            <span>contacto@canisboutique.com</span>
                        </li>
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

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/drift-zoom/Drift.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>