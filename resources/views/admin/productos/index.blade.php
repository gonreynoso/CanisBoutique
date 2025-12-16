@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Productos</h2>
            <p class="text-muted mb-0">Gestiona el inventario de la tienda.</p>
        </div>
        <a href="{{ route('admin.productos.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i> Nuevo Producto
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-secondary text-uppercase small fw-bold">Producto</th>
                            <th class="py-3 text-secondary text-uppercase small fw-bold">Categoría</th>
                            <th class="py-3 text-secondary text-uppercase small fw-bold">Precio</th>
                            <th class="py-3 text-secondary text-uppercase small fw-bold">Stock</th>
                            <th class="py-3 text-end pe-4 text-secondary text-uppercase small fw-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-3 border overflow-hidden me-3" style="width: 50px; height: 50px;">
                                            <img src="{{ asset($product->imagen_url) }}" alt="img"
                                                class="w-100 h-100 object-fit-cover">
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $product->nombre }}</div>
                                            <small class="text-muted d-block text-truncate" style="max-width: 200px;">
                                                {{ $product->descripcion ?? 'Sin descripción' }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border rounded-pill fw-normal px-3">
                                        {{ $product->categoria }}
                                    </span>
                                </td>
                                <td class="fw-bold text-dark">
                                    ${{ number_format($product->precio, 0, ',', '.') }}
                                </td>
                                <td>
                                    @if($product->stock == 0)
                                        <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">Agotado</span>
                                    @elseif($product->stock < 5)
                                        <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3">Bajo:
                                            {{ $product->stock }}</span>
                                    @else
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">{{ $product->stock }}
                                            un.</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.productos.edit', $product->id) }}"
                                            class="btn btn-sm btn-light border text-primary" title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.productos.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light border text-danger"
                                                title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-box-seam display-4 d-block mb-3 opacity-50"></i>
                                    <span>No hay productos registrados aún.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($products->hasPages())
            <div class="card-footer bg-white border-top py-3">
                {{ $products->links() }}
            </div>
        @endif
    </div>

@endsection