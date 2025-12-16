@extends('layouts.web')

@section('title', '¡Gracias por tu compra!')

@section('content')

    <div class="container py-5 mt-4">
        <div class="row justify-content-center">

            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card border-0 shadow rounded-4 text-white overflow-hidden" style="background-color: #d63384;">
                    <div class="card-body p-4 text-center">
                        <div class="bg-white text-pink-custom rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-check-lg fs-2"></i>
                        </div>
                        <h4 class="fw-bold text-white">Orden #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h4>
                        <p class="mb-0 text-white-50">{{ $order->created_at->format('d M, Y') }}</p>
                    </div>
                    <div class="bg-dark bg-opacity-10 p-4">
                        <h5 class="fw-bold mb-3 border-bottom border-white border-opacity-25 pb-2">Resumen</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Pagado</span>
                            <span class="fw-bold">${{ number_format($order->total, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Estado</span>
                            <span class="badge bg-white text-dark">{{ ucfirst($order->estado) }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('tienda.index') }}" class="btn btn-outline-dark rounded-pill w-100 py-2">
                        <i class="bi bi-arrow-left me-2"></i> Volver a la Tienda
                    </a>
                </div>
            </div>

            <div class="col-lg-7 ms-lg-4">
                <div class="text-center text-lg-start mb-5">
                    <h1 class="fw-bold mb-3">¡Gracias por tu compra, {{ explode(' ', $order->cliente_nombre)[0] }}!</h1>
                    <p class="text-muted lead">Hemos recibido tu pedido correctamente. Te enviaremos un email con los
                        detalles pronto.</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-geo-alt me-2 text-pink-custom"></i> Detalles de Envío</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <strong class="d-block text-muted small text-uppercase">Enviar a:</strong>
                                <p class="mb-0 fw-bold">{{ $order->cliente_nombre }}</p>
                                <p class="mb-0">{{ $order->cliente_direccion }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong class="d-block text-muted small text-uppercase">Contacto:</strong>
                                <p class="mb-0">{{ $order->cliente_email }}</p>
                                <p class="mb-0">{{ $order->cliente_telefono }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-bag-check me-2 text-pink-custom"></i> Productos</h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($order->items as $item)
                            <div class="d-flex align-items-center p-3 border-bottom">
                                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center me-3"
                                    style="width: 60px; height: 60px;">
                                    <i class="bi bi-box-seam text-muted fs-4"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 fw-bold">{{ $item->nombre_producto }}</h6>
                                    <small class="text-muted">Cantidad: {{ $item->cantidad }}</small>
                                </div>
                                <div class="fw-bold">
                                    ${{ number_format($item->subtotal, 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection