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
                            <a href="{{ route('tienda.index', ['search' => request('search')]) }}" 
                               class="d-flex justify-content-between align-items-center text-decoration-none {{ !request('categoria') ? 'text-primary fw-bold' : 'text-dark' }}">
                                <span>Ver Todo</span>
                                <i class="bi bi-chevron-right small text-muted"></i>
                            </a>
                        </li>
                        
                        @php
                            $categorias = [
                                'alimentos' => '🥦 Alimentos',
                                'juguetes' => '🎾 Juguetes',
                                'ropa' => '👕 Ropa',
                                'higiene' => '🧴 Higiene'
                            ];
                        @endphp

                        @foreach($categorias as $slug => $nombre)
                        <li class="mb-2">
                            <a href="{{ route('tienda.index', ['categoria' => $slug, 'search' => request('search')]) }}" 
                               class="d-flex justify-content-between align-items-center text-decoration-none {{ request('categoria') == $slug ? 'text-primary fw-bold' : 'text-dark' }}">
                                <span>{{ $nombre }}</span>
                                <i class="bi bi-chevron-right small text-muted"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    
        <div class="col-lg-9">
            
     
            <section class="category-header mb-3">
                <div class="d-flex justify-content-between align-items-center border p-3 rounded-4 bg-white shadow-sm">
                    <div class="d-flex align-items-center">
                        <span class="me-2 text-muted">Mostrando:</span>
                        <span class="fw-bold text-dark">{{ $productos->total() }} resultados</span>
                        @if(request('categoria'))
                            <span class="badge bg-light text-pink-custom border rounded-pill ms-2 px-3">
                                {{ ucfirst(request('categoria')) }}
                            </span>
                        @endif
                    </div>
                </div>
            </section>

            
            <div class="widget-item mb-4 p-3 border rounded-4 bg-white shadow-sm">
                <form action="{{ route('tienda.index') }}" method="GET">
                    @if(request('categoria'))
                        <input type="hidden" name="categoria" value="{{ request('categoria') }}">
                    @endif
                    
                    <div class="input-group">
                        <input type="text" 
                            name="search" 
                            class="form-control border-end-0 rounded-start-pill ps-3" 
                            placeholder="Buscar en esta sección..." 
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary border-start-0 rounded-end-pill pe-3" type="submit">
                            <i class="bi bi-search" style="color: #d63384;"></i>
                        </button>
                    </div>
                    @if(request('search'))
                        <div class="mt-2 text-center">
                            <a href="{{ route('tienda.index', ['categoria' => request('categoria')]) }}" class="text-muted small text-decoration-none">
                                <i class="bi bi-x-circle"></i> Limpiar búsqueda "<strong>{{ request('search') }}</strong>"
                            </a>
                        </div>
                    @endif
                </form>
            </div>

     
            <section id="category-product-list">
                <div class="row g-4">
                    @forelse($productos as $producto)
                        <div class="col-md-6 col-xl-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden product-card position-relative">
                                <div class="position-relative overflow-hidden" style="height: 280px;">
                                    <img src="{{ $producto->imagen_url }}" 
                                         class="w-100 h-100 object-fit-cover transition-transform" 
                                         alt="{{ $producto->nombre }}">
                                    
                                    @if($producto->stock < 5)
                                        <div class="position-absolute top-0 start-0 m-3 badge bg-danger text-white rounded-pill px-3 py-2">
                                            ¡Últimos!
                                        </div>
                                    @endif

                                    <div class="position-absolute bottom-0 start-0 w-100 p-3 d-flex justify-content-center gap-2" 
                                         style="background: linear-gradient(to top, rgba(0,0,0,0.4), transparent);">
                                        <a href="{{ route('tienda.show', $producto->id) }}" class="btn btn-light rounded-circle shadow-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('carrito.add', $producto->id) }}" class="btn btn-primary rounded-circle shadow-sm" style="background-color: #d63384; border-color: #d63384;">
                                            <i class="bi bi-cart-plus"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body text-center p-4">
                                    <div class="text-muted small text-uppercase mb-1">{{ $producto->categoria }}</div>
                                    <h5 class="card-title fw-bold text-dark mb-2">
                                        <a href="{{ route('tienda.show', $producto->id) }}" class="text-decoration-none text-dark stretched-link">
                                            {{ Str::limit($producto->nombre, 25) }}
                                        </a>
                                    </h5>
                                    <div class="h5 fw-bold" style="color: #d63384;">
                                        ${{ number_format($producto->precio, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-search display-1 text-muted opacity-25"></i>
                            <h3 class="fw-bold mt-3">No hay resultados</h3>
                            <p class="text-muted">Intenta con otros filtros o términos de búsqueda.</p>
                            <a href="{{ route('tienda.index') }}" class="btn btn-outline-dark mt-2">Ver todo el catálogo</a>
                        </div>
                    @endforelse
                </div>
            </section>

           
            <section class="mt-5 d-flex justify-content-center">
                {{ $productos->withQueryString()->links('vendor.pagination.bootstrap-5') }}
            </section>
        </div>
    </div>
</div>

<style>
    .text-pink-custom { color: #d63384; }
    .object-fit-cover { object-fit: cover; }
    .product-card { transition: all 0.3s ease; }
    .product-card:hover { transform: translateY(-5px); shadow: 0 .5rem 1rem rgba(0,0,0,.15); }
    
   
    :root { --canis-pink: #d63384; --canis-pink-hover: #b82b71; }
    .page-link { color: var(--canis-pink); border-radius: 50% !important; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin: 0 3px; font-weight: 600; }
    .page-item.active .page-link { background-color: var(--canis-pink); border-color: var(--canis-pink); color: #fff; }
    .page-link:hover { background-color: var(--canis-pink-hover); color: #fff; }
</style>

@endsection