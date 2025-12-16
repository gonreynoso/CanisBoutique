@extends('layouts.web')

@section('title', 'Tu Carrito - CanisBoutique')

@section('content')

<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center py-4">
        <h1 class="mb-2 mb-lg-0">Carrito de Compras</h1>
        <nav class="breadcrumbs">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Carrito</li>
            </ol>
        </nav>
    </div>
</div>

<section id="cart" class="cart section py-5">
    <div class="container" data-aos="fade-up">
        
        @if(session('cart') && count(session('cart')) > 0)
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-items card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                        <div class="card-body p-0">
                            {{-- Header Tabla (Desktop) --}}
                            <div class="cart-header bg-light p-3 d-none d-lg-block fw-bold text-secondary">
                                <div class="row">
                                    <div class="col-6">Producto</div>
                                    <div class="col-2 text-center">Precio</div>
                                    <div class="col-2 text-center">Cantidad</div>
                                    <div class="col-2 text-center">Total</div>
                                </div>
                            </div>

                            {{-- Items Loop --}}
                            @php $total = 0; @endphp
                            @foreach(session('cart') as $id => $details)
                                @php 
                                    $subtotal = $details['precio'] * $details['cantidad']; 
                                    $total += $subtotal;
                                @endphp
                                
                                <div class="cart-item p-3 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-12 d-flex align-items-center gap-3">
                                            <img src="{{ $details['imagen'] }}" alt="{{ $details['nombre'] }}" class="rounded-3 border" style="width: 80px; height: 80px; object-fit: cover;">
                                            <div>
                                                <h6 class="mb-1 fw-bold">{{ $details['nombre'] }}</h6>
                                                <a href="{{ route('carrito.remove', $id) }}" class="text-danger small text-decoration-none">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-12 text-center mt-3 mt-lg-0">
                                            <span class="d-lg-none fw-bold me-2">Precio:</span>
                                            ${{ number_format($details['precio'], 0, ',', '.') }}
                                        </div>
                                        <div class="col-lg-2 col-12 text-center mt-3 mt-lg-0">
                                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fs-6">{{ $details['cantidad'] }}</span>
                                        </div>
                                        <div class="col-lg-2 col-12 text-center mt-3 mt-lg-0 fw-bold text-pink-custom">
                                            <span class="d-lg-none text-dark me-2">Total:</span>
                                            ${{ number_format($subtotal, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tienda.index') }}" class="btn btn-outline-dark rounded-pill">
                            <i class="bi bi-arrow-left me-2"></i> Seguir Comprando
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="cart-summary card border-0 shadow-sm rounded-4 bg-light p-4">
                        <h4 class="fw-bold mb-4">Resumen del Pedido</h4>
                        
                        <div class="d-flex justify-content-between mb-3 text-muted">
                            <span>Subtotal</span>
                            <span>${{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 text-muted">
                            <span>Envío</span>
                            <span class="text-success fw-bold">Gratis</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4 h4 fw-bold">
                            <span>Total</span>
                            <span class="text-pink-custom">${{ number_format($total, 0, ',', '.') }}</span>
                        </div>

                        <a href="{{ route('tienda.checkout') }}" class="btn btn-primary w-100 py-3 rounded-pill fw-bold" style="background-color: #d63384; border-color: #d63384;">
                            Proceder al Pago <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        
                        <div class="mt-4 text-center text-muted small">
                            <i class="bi bi-shield-lock me-1"></i> Compra 100% Segura
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <div class="mb-4 text-muted opacity-25">
                    <i class="bi bi-cart-x" style="font-size: 5rem;"></i>
                </div>
                <h3>Tu carrito está vacío</h3>
                <p class="text-muted">¡Mira nuestras novedades y consiente a tu mascota!</p>
                <a href="{{ route('tienda.index') }}" class="btn btn-primary rounded-pill px-5 mt-3" style="background-color: #d63384; border-color: #d63384;">Ir a la Tienda</a>
            </div>
        @endif
    </div>
</section>
@endsection