@extends('layouts.web')

@section('title', $producto->nombre . ' - CanisBoutique')

@section('content')

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center py-4">
            <h1 class="mb-2 mb-lg-0">{{ $producto->nombre }}</h1>
            <nav class="breadcrumbs">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tienda.index') }}">Tienda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalle</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="product-details" class="product-details section py-5">
        <div class="container" data-aos="fade-up">
            <div class="row g-4">

                <div class="col-lg-7">
                    <div class="product-gallery">
                        <div class="main-showcase mb-4">
                            <div class="image-zoom-container rounded-4 overflow-hidden border">
                                <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}"
                                    class="img-fluid w-100 object-fit-cover" style="height: 500px;">
                            </div>
                        </div>
                        {{-- Si tuvieras más imágenes, irían aquí en el thumbnail-grid --}}
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="product-details-content ps-lg-4">
                        <div class="product-badge-container mb-3">
                            <span
                                class="badge bg-light text-dark border px-3 py-2 rounded-pill text-uppercase">{{ $producto->categoria }}</span>
                            <div class="rating-group d-inline-flex align-items-center ms-3 text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span class="text-muted ms-2 small">(Calidad Premium)</span>
                            </div>
                        </div>

                        <h2 class="product-name fw-bold mb-3">{{ $producto->nombre }}</h2>

                        <div class="pricing-section mb-4">
                            <span
                                class="display-5 fw-bold text-pink-custom">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                        </div>

                        <div class="product-description mb-4 text-muted">
                            <p>{{ $producto->descripcion ?? 'Descripción no disponible para este producto.' }}</p>
                        </div>

                        <div class="availability-status mb-4">
                            @if($producto->stock > 0)
                                <div class="text-success fw-bold"><i class="bi bi-check-circle-fill me-2"></i> En Stock
                                    ({{ $producto->stock }} disponibles)</div>
                            @else
                                <div class="text-danger fw-bold"><i class="bi bi-x-circle-fill me-2"></i> Agotado</div>
                            @endif
                        </div>

                        <div class="purchase-section d-flex gap-3 mt-4">
                            @if($producto->stock > 0)
                                <a href="{{ route('carrito.add', $producto->id) }}"
                                    class="btn btn-primary btn-lg rounded-pill px-5 flex-grow-1"
                                    style="background-color: #d63384; border-color: #d63384;">
                                    <i class="bi bi-bag-plus me-2"></i> Agregar al Carrito
                                </a>
                            @else
                                <button class="btn btn-secondary btn-lg rounded-pill px-5 flex-grow-1" disabled>
                                    Sin Stock
                                </button>
                            @endif

                            <button class="btn btn-outline-dark btn-lg rounded-circle" title="Guardar en Favoritos">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>

                        <div class="benefits-list mt-5 pt-4 border-top">
                            <div class="row g-3">
                                <div class="col-6 d-flex align-items-center gap-2 text-muted small">
                                    <i class="bi bi-truck fs-5 text-pink-custom"></i> Envíos a todo el país
                                </div>
                                <div class="col-6 d-flex align-items-center gap-2 text-muted small">
                                    <i class="bi bi-shield-check fs-5 text-pink-custom"></i> Garantía CanisBoutique
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection