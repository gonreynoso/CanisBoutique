@extends('layouts.web')

@section('content')


<div class="container pb-5">
    <div class="row">

        <div class="col-lg-3 sidebar">
            <div class="widgets-container">

                <div class="widget-item mb-4 p-4 border rounded-4 bg-white shadow-sm">
                    <h3 class="widget-title fw-bold mb-3 fs-5">Categorías</h3>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="{{ route('tienda.index') }}" 
                               class="d-flex justify-content-between align-items-center text-decoration-none {{ !request('categoria') ? 'text-primary fw-bold' : 'text-dark' }}">
                                <span>Ver Todo</span>
                                <i class="bi bi-chevron-right small text-muted"></i>
                            </a>
                        </li>
                        
                        <li class="mb-2">
                            <a href="{{ route('tienda.index', ['categoria' => 'alimentos']) }}" 
                               class="d-flex justify-content-between align-items-center text-decoration-none {{ request('categoria') == 'alimentos' ? 'text-primary fw-bold' : 'text-dark' }}">
                                <span>🥦 Alimentos</span>
                                <span class="badge bg-light text-dark rounded-pill">10</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('tienda.index', ['categoria' => 'juguetes']) }}" 
                               class="d-flex justify-content-between align-items-center text-decoration-none {{ request('categoria') == 'juguetes' ? 'text-primary fw-bold' : 'text-dark' }}">
                                <span>🎾 Juguetes</span>
                                <span class="badge bg-light text-dark rounded-pill">10</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('tienda.index', ['categoria' => 'ropa']) }}" 
                               class="d-flex justify-content-between align-items-center text-decoration-none {{ request('categoria') == 'ropa' ? 'text-primary fw-bold' : 'text-dark' }}">
                                <span>👕 Ropa</span>
                                <span class="badge bg-light text-dark rounded-pill">10</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="alert alert-info small">
                    <i class="bi bi-info-circle"></i> Más filtros próximamente.
                 </div>

            </div>
        </div>

        <div class="col-lg-9">

            <section class="category-header mb-4">
                <div class="d-flex justify-content-between align-items-center border p-3 rounded-4 bg-white shadow-sm">
                    <div class="d-flex align-items-center">
                        <span class="me-2 text-muted">Mostrando:</span>
                        <span class="fw-bold text-dark">{{ $productos->count() }} resultados</span>
                    </div>
                    
                    <div class="d-flex align-items-center">
                        <select class="form-select form-select-sm border-0 bg-light" aria-label="Sort by">
                            <option selected>Más Recientes</option>
                            <option value="1">Menor Precio</option>
                            <option value="2">Mayor Precio</option>
                        </select>
                    </div>
                </div>
            </section>

            <section id="category-product-list">
                <div class="row g-4">
                    @forelse($productos as $producto)
                        <div class="col-md-6 col-xl-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden product-card position-relative group">
                                
                                <div class="position-relative overflow-hidden" style="height: 280px;">
                                    {{-- Como no tienes 2 imagenes, usamos la misma para el efecto hover o solo una --}}
                                    <img src="{{ $producto->imagen_url }}" 
                                         class="w-100 h-100 object-fit-cover transition-transform duration-300" 
                                         alt="{{ $producto->nombre }}">
                                    
                                    @if($producto->stock < 5)
                                        <div class="position-absolute top-0 start-0 m-3 badge bg-danger text-white rounded-pill px-3 py-2">
                                            ¡Últimos!
                                        </div>
                                    @endif

                                    <div class="position-absolute bottom-0 start-0 w-100 p-3 d-flex justify-content-center gap-2 bg-gradient-dark-transparent" 
                                         style="background: linear-gradient(to top, rgba(0,0,0,0.4), transparent);">
                                        <a href="{{ route('tienda.show', $producto->id) }}" class="btn btn-light rounded-circle shadow-sm" data-bs-toggle="tooltip" title="Ver Detalle">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <button class="btn btn-primary rounded-circle shadow-sm" style="background-color: #d63384; border-color: #d63384;">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body text-center p-4">
                                    <div class="text-muted small text-uppercase mb-1">{{ $producto->categoria }}</div>
                                    <h5 class="card-title fw-bold text-dark mb-2">
                                        <a href="{{ route('tienda.show', $producto->id) }}" class="text-decoration-none text-dark stretched-link">
                                            {{ Str::limit($producto->nombre, 20) }}
                                        </a>
                                    </h5>
                                    
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <span class="h5 fw-bold text-primary mb-0" style="color: #d63384 !important;">
                                            ${{ number_format($producto->precio, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    
                                    <div class="small text-warning mt-2">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span class="text-muted ms-1">(5.0)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="mb-3">
                                <i class="bi bi-search display-1 text-muted opacity-25"></i>
                            </div>
                            <h3 class="fw-bold">No encontramos productos aquí</h3>
                            <p class="text-muted">Intenta seleccionar otra categoría.</p>
                            <a href="{{ route('tienda.index') }}" class="btn btn-outline-dark mt-2">Ver todo el catálogo</a>
                        </div>
                    @endforelse
                </div>
            </section>

            <section class="mt-5 d-flex justify-content-center">
                {{-- Esto le dice a Laravel que use el archivo que acabas de editar en vendor/pagination --}}
                {{ $productos->withQueryString()->links('vendor.pagination.bootstrap-5') }}
            </section>

        </div>
    </div>
</div>

<style>
    /* Ajustes mínimos para que funcione con tu layout actual */
    .object-fit-cover { object-fit: cover; }
    
    /* Efecto hover suave en las cards */
    .product-card { transition: transform 0.2s, box-shadow 0.2s; }
    .product-card:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; 
    }

    /* Paginación Personalizada Rosa */
.page-link {
    color: var(--canis-pink); /* Texto rosa */
    border: 1px solid #dee2e6;
    margin: 0 3px;
    border-radius: 50% !important; /* Círculos en lugar de cuadrados */
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.page-link:hover {
    color: #fff;
    background-color: var(--canis-pink-hover);
    border-color: var(--canis-pink-hover);
}

.page-item.active .page-link {
    background-color: var(--canis-pink);
    border-color: var(--canis-pink);
    color: #fff;
    box-shadow: 0 4px 10px rgba(214, 51, 132, 0.3); /* Sombra suave rosa */
}

.page-item.disabled .page-link {
    color: #6c757d;
    background-color: #fff;
    border-color: #dee2e6;
}

/* Ocultar el focus azul feo de Bootstrap */
.page-link:focus {
    box-shadow: 0 0 0 0.25rem rgba(214, 51, 132, 0.25);
}
</style>
@endsection