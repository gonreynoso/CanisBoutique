@extends('layouts.web')

@section('title', 'Inicio - CanisBoutique')

@section('content')

    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div data-aos="fade-up">
                        <span class="hero-subtitle">Bienvenido a CanisBoutique</span>
                        <h1 class="hero-title my-3">Amor, Estilo y <br>Cuidado para tu compañero</h1>
                        <p class="lead text-muted mb-4">
                            Encuentra los mejores accesorios, alimentos premium y reserva un día de spa inolvidable para tu
                            mejor amigo.
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
                <div class="col-lg-6 order-1 order-lg-2 text-center position-relative">
                    <div class="image-wrapper">
                        {{-- OJO: Asegúrate de tener esta imagen en public/images/ --}}
                        <img src="{{ asset('images/pet-grooming-at-home-scaled-1.jpg') }}" alt="Canis Hero"
                            class="img-fluid rounded-circle shadow-lg hero-main-img">
                        <div class="floating-card bg-white p-3 rounded-4 shadow d-none d-md-flex align-items-center gap-3">
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

    <section id="promo-cards" class="promo-cards section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                {{-- DESTACADA --}}
                <div class="col-lg-6">
                    <div class="category-featured" data-aos="fade-right" data-aos-delay="200">
                        <div class="category-image">
                            <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?q=80&w=1200&auto=format&fit=crop"
                                alt="Peluquería Canina" class="img-fluid">
                        </div>
                        <div class="category-content">
                            <span class="category-tag">Servicio Estrella</span>
                            <h2>Spa & Peluquería Canina</h2>
                            <p>Baños relajantes, cortes de raza y mimos garantizados.</p>
                            <a href="#servicios" class="btn-shop">Ver Servicios <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- GRID SECUNDARIO --}}
                <div class="col-lg-6">
                    <div class="row gy-4">
                        <div class="col-xl-6">
                            <div class="category-card cat-men" data-aos="fade-up" data-aos-delay="300">
                                <div class="category-image">
                                    <img src="https://images.unsplash.com/photo-1589924691195-41432c84c161?q=80&w=600&auto=format&fit=crop"
                                        alt="Alimento" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Nutrición</h4>
                                    <p>Alimentos Premium</p>
                                    <a href="#" class="card-link">Comprar Ahora <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="category-card cat-kids" data-aos="fade-up" data-aos-delay="400">
                                <div class="category-image">
                                    <img src="https://images.unsplash.com/photo-1576201836106-db1758fd1c97?q=80&w=600&auto=format&fit=crop"
                                        alt="Juguetes" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Diversión</h4>
                                    <p>Juguetes y Mordillos</p>
                                    <a href="#" class="card-link">Explorar <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="category-card cat-cosmetics" data-aos="fade-up" data-aos-delay="500">
                                <div class="category-image">
                                    <img src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?q=80&w=600&auto=format&fit=crop"
                                        alt="Higiene" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Higiene</h4>
                                    <p>Shampoos y Colonias</p>
                                    <a href="#" class="card-link">Ver Catálogo <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="category-card cat-accessories" data-aos="fade-up" data-aos-delay="600">
                                <div class="category-image">
                                    <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?q=80&w=600&auto=format&fit=crop"
                                        alt="Accesorios" class="img-fluid">
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
                                <span class="swatch active" title="Marrón" style="background-color: #634832;"></span>
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
                                <span class="swatch active" title="Naranja" style="background-color: #ff6600;"></span>
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

    </section>

    {{-- Call to Action 1 --}}
    <section class="py-5 text-white text-center"
        style="background: linear-gradient(rgba(214, 51, 132, 0.9), rgba(214, 51, 132, 0.8)), url('{{ asset('images/pet-grooming-at-home-scaled-1.jpg') }}') center/cover fixed;">
        <div class="container py-4">
            <h2 class="text-white display-5 fw-bold mb-3">¡Dale a tu amigo un día de Spa!</h2>
            <p class="lead text-white mb-4 mx-auto" style="max-width: 700px;">
                Nuestros expertos estilistas caninos están listos para dejar a tu compañero radiante.
            </p>
            <a href="{{ route('web.reservar') }}" class="btn btn-light btn-lg rounded-pill fw-bold px-5 py-3"
                style="color: var(--canis-pink);">
                Reservar Cita Ahora
            </a>
        </div>
    </section>

    {{-- Call to Action 2 --}}
    <section id="call-to-action" class="call-to-action section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="main-content text-center" data-aos="zoom-in" data-aos-delay="200">
                        <div class="offer-badge" data-aos="fade-down" data-aos-delay="250">
                            <span class="limited-time">Tiempo Limitado</span>
                            <span class="offer-text">30% OFF</span>
                        </div>
                        <h2 data-aos="fade-up" data-aos-delay="300">¡Gran Oferta de Verano en CanisBoutique!</h2>
                        <p class="subtitle" data-aos="fade-up" data-aos-delay="350">
                            Accesorios seleccionados y mimos premium a precios imbatibles.
                        </p>
                        <div class="action-buttons" data-aos="fade-up" data-aos-delay="450">
                            <a href="#productos" class="btn-shop-now">Comprar Ahora</a>
                            <a href="#" class="btn-view-deals">Ver Ofertas del Mes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-contact />

@endsection