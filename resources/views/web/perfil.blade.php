@extends('layouts.web')

@section('title', 'Mi Cuenta - CanisBoutique')

@section('content')


<section id="account" class="account section py-5">
    <div class="container" data-aos="fade-up">
        
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4 text-center bg-white">
                        <div class="mb-3 mx-auto d-flex align-items-center justify-content-center bg-light text-pink-custom rounded-circle fw-bold fs-2" style="width: 80px; height: 80px; border: 2px solid var(--canis-pink);">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <h5 class="fw-bold mb-1">{{ Auth::user()->name }}</h5>
                        <p class="text-muted small mb-3">{{ Auth::user()->email }}</p>
                        <div class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                            <i class="bi bi-shield-check me-1"></i> Miembro Verificado
                        </div>
                    </div>
                    
                    <div class="list-group list-group-flush border-top">
                        <a href="#orders" data-bs-toggle="tab" class="list-group-item list-group-item-action active py-3 px-4 border-0 d-flex align-items-center">
                            <i class="bi bi-box-seam me-3 fs-5 text-secondary"></i> Mis Pedidos
                            <span class="badge bg-pink-light text-pink-custom ms-auto rounded-pill">{{ $orders->count() }}</span>
                        </a>
                        
                        <div class="p-3 border-top mt-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100 rounded-pill">
                                    <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="tab-content">
                    
                    <div class="tab-pane fade show active" id="orders">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold mb-0">Historial de Pedidos</h3>
                        </div>

                        @if($orders->count() > 0)
                            <div class="d-flex flex-column gap-4">
                                @foreach($orders as $order)
                                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                                        <div class="card-header bg-light bg-opacity-50 py-3 px-4 d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Orden ID</small>
                                                    <span class="fw-bold">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                                                </div>
                                                <div class="border-start ps-3 ms-2">
                                                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Fecha</small>
                                                    <span>{{ $order->created_at->format('d M, Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="text-end mt-2 mt-md-0">
                                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Total</small>
                                                <span class="fw-bold text-pink-custom fs-5">${{ number_format($order->total, 0, ',', '.') }}</span>
                                            </div>
                                        </div>

                                        <div class="card-body p-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <div class="mb-3 d-flex align-items-center">
                                                        <span class="text-muted me-2">Estado:</span>
                                                        @if($order->estado == 'pagado')
                                                            <span class="badge bg-success rounded-pill px-3"><i class="bi bi-check-circle me-1"></i> Pagado</span>
                                                        @elseif($order->estado == 'pendiente')
                                                            <span class="badge bg-warning text-dark rounded-pill px-3"><i class="bi bi-clock me-1"></i> Pendiente</span>
                                                        @else
                                                            <span class="badge bg-secondary rounded-pill px-3">{{ ucfirst($order->estado) }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="d-flex gap-3 overflow-auto pb-2">
                                                        @foreach($order->items as $item)
                                                            <div class="d-flex align-items-center bg-white rounded-3 p-3 border shadow-sm" style="min-width: 400px;">
    
                                                            {{-- Icono / Imagen --}}
                                                            <div class="bg-light rounded p-2 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                                <i class="bi bi-bag-heart text-pink-custom fs-4"></i>
                                                            </div>
                                                            
                                                            {{-- Textos --}}
                                                            <div class="lh-sm flex-grow-1">
                                                                {{-- Aumenté el max-width a 200px y agregué 'title' para ver el nombre completo al pasar el mouse --}}
                                                                <span class="d-block fw-bold text-truncate text-dark" style="max-width: 200px;" title="{{ $item->nombre_producto }}">
                                                                    {{ $item->nombre_producto }}
                                                                </span>
                                                                <div class="d-flex justify-content-between align-items-center mt-1">
                                                                    <small class="text-muted">Cant: {{ $item->cantidad }}</small>
                                                                    <span class="small fw-bold text-pink-custom">${{ number_format($item->subtotal, 0, ',', '.') }}</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                                                    <button class="btn btn-outline-dark rounded-pill w-100 mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#detail-{{ $order->id }}">
                                                        Ver Detalles <i class="bi bi-chevron-down ms-1"></i>
                                                    </button>
                                                    <button class="btn btn-primary rounded-pill w-100" style="background-color: #d63384; border-color: #d63384;">Comprar de nuevo</button>
                                                </div>
                                            </div>

                                            <div class="collapse mt-4" id="detail-{{ $order->id }}">
                                                <div class="card card-body bg-light border-0 rounded-3">
                                                    <h6 class="fw-bold mb-3">Detalles de la orden</h6>
                                                    <p class="mb-1 text-muted"><i class="bi bi-geo-alt me-2"></i> {{ $order->cliente_direccion }}</p>
                                                    <p class="mb-0 text-muted"><i class="bi bi-telephone me-2"></i> {{ $order->cliente_telefono }}</p>
                                                    <p class="mb-0 text-muted"><i class="bi bi-envelope me-2"></i> {{ $order->cliente_email }}</p>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5 card border-0 shadow-sm rounded-4">
                                <div class="mb-3 text-muted opacity-25">
                                    <i class="bi bi-bag-x" style="font-size: 4rem;"></i>
                                </div>
                                <h4>Aún no tienes pedidos</h4>
                                <p class="text-muted">¡Es hora de consentir a tu mascota con algo especial!</p>
                                <a href="{{ route('tienda.index') }}" class="btn btn-primary rounded-pill px-5 mt-3" style="background-color: #d63384; border-color: #d63384;">Ir a la Tienda</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
  
    .bg-pink-light { background-color: rgba(214, 51, 132, 0.1); }
    .text-pink-custom { color: #d63384; }
    
    .list-group-item-action:hover, .list-group-item-action.active {
        background-color: #f8f9fa;
        color: #d63384;
        font-weight: 600;
        border-left: 4px solid #d63384 !important;
    }
    .list-group-item { transition: all 0.2s; border-left: 4px solid transparent; }
</style>

@endsection