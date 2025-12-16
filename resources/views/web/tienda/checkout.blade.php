@extends('layouts.web')

@section('title', 'Finalizar Compra - CanisBoutique')

@section('content')

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center py-4">
            <h1 class="mb-2 mb-lg-0">Finalizar Compra</h1>
            <nav class="breadcrumbs">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="checkout section py-5">
        <div class="container" data-aos="fade-up">

            <form action="{{ route('tienda.processOrder') }}" method="POST">
                @csrf

                <div class="row g-4">
                    
                    {{-- COLUMNA IZQUIERDA: PASOS 1, 2 y 3 --}}
                    <div class="col-lg-7">
                        
                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 35px; height: 35px;">1</div>
                                <h3 class="mb-0 fw-bold fs-4">Datos del Cliente</h3>
                            </div>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fw-bold">Nombre Completo</label>
                                    <input type="text" name="cliente_nombre" class="form-control py-2" required
                                        value="{{ old('cliente_nombre', auth()->user()->name ?? '') }}">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" name="cliente_email" class="form-control py-2" required
                                        value="{{ old('cliente_email', auth()->user()->email ?? '') }}">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Teléfono</label>
                                    <input type="tel" name="cliente_telefono" class="form-control py-2" required
                                        value="{{ old('cliente_telefono', auth()->user()->telefono ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 35px; height: 35px;">2</div>
                                <h3 class="mb-0 fw-bold fs-4">Dirección de Envío</h3>
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label fw-bold">Dirección Completa</label>
                                <input type="text" name="cliente_direccion" class="form-control py-2"
                                    placeholder="Calle, Altura, Piso, Ciudad..." required
                                    value="{{ old('cliente_direccion', auth()->user()->direccion ?? '') }}">
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 35px; height: 35px;">3</div>
                                <h3 class="mb-0 fw-bold fs-4">Método de Pago</h3>
                            </div>
                            
                            <div class="form-check p-3 border rounded-3 mb-2 bg-light d-flex align-items-center">
                                <input class="form-check-input mt-0 me-3" type="radio" name="pago" id="credit" checked>
                                <label class="form-check-label fw-bold w-100" for="credit" style="cursor: pointer;">
                                    <i class="bi bi-credit-card-2-front fs-5 me-2 text-primary"></i> Tarjeta de Crédito / Débito
                                </label>
                            </div>
                            
                            <div class="form-check p-3 border rounded-3 d-flex align-items-center">
                                <input class="form-check-input mt-0 me-3" type="radio" name="pago" id="cash">
                                <label class="form-check-label fw-bold w-100" for="cash" style="cursor: pointer;">
                                    <i class="bi bi-cash-coin fs-5 me-2 text-success"></i> Efectivo al Recibir
                                </label>
                            </div>
                        </div>
                        
                    </div>

                    {{-- COLUMNA DERECHA: RESUMEN (Sticky) --}}
                    <div class="col-lg-5">
                        <div class="card bg-light border-0 rounded-4 shadow-sm p-4 position-sticky" style="top: 100px; z-index: 10;">
                            <h4 class="fw-bold mb-4">Resumen del Pedido</h4>

                            @php $total = 0; @endphp
                            
                            <div class="d-flex flex-column gap-3 mb-4">
                                @if(session('cart'))
                                    @foreach(session('cart') as $item)
                                        @php $total += $item['precio'] * $item['cantidad']; @endphp
                                        <div class="d-flex align-items-center bg-white p-2 rounded-3 border">
                                            <img src="{{ $item['imagen'] }}" class="rounded me-3" width="50" height="50"
                                                style="object-fit: cover;">
                                            <div class="flex-grow-1 lh-sm">
                                                <h6 class="mb-0 small fw-bold">{{ $item['nombre'] }}</h6>
                                                <small class="text-muted">Cant: {{ $item['cantidad'] }}</small>
                                            </div>
                                            <div class="fw-bold small text-pink-custom ms-2">
                                                ${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted text-center small">No hay productos en el carrito.</p>
                                @endif
                            </div>

                            <hr>
                            
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="h5 fw-bold mb-0">Total a Pagar</span>
                                <span class="h4 fw-bold text-pink-custom mb-0">${{ number_format($total, 0, ',', '.') }}</span>
                            </div>

                            <button type="submit" class="btn btn-success w-100 py-3 rounded-pill fw-bold fs-5 shadow-sm">
                                Confirmar Compra <i class="bi bi-check-lg ms-2"></i>
                            </button>
                            
                            <div class="text-center mt-3">
                                <a href="{{ route('tienda.cart') }}" class="text-decoration-none text-muted small">
                                    <i class="bi bi-arrow-left"></i> Volver al Carrito
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div> </form>
        </div>
    </section>
@endsection