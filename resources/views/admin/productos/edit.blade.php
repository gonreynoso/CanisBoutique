@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Editar Producto</h2>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
            <i class="bi bi-arrow-left me-2"></i> Volver
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-light py-3 px-4">
                    <h6 class="mb-0 fw-bold">Información del Producto: {{ $product->nombre }}</h6>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">

                            <div class="col-md-4 text-center">
                                <label class="form-label fw-bold mb-3 d-block text-start">Imagen Actual</label>

                                <div class="border rounded-3 p-2 bg-light mb-3 position-relative mx-auto"
                                    style="max-width: 250px;">
                                    <img src="{{ asset($product->imagen_url) }}" class="img-fluid rounded shadow-sm"
                                        alt="Vista previa" id="preview-img">
                                </div>

                                <div class="text-start">
                                    <label for="imagen" class="form-label small text-muted">Cambiar Imagen
                                        (Opcional)</label>
                                    <input type="file" name="imagen" id="imagen" class="form-control form-control-sm"
                                        accept="image/*" onchange="previewImage(event)">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Nombre del Producto</label>
                                        <input type="text" name="nombre" class="form-control" required
                                            value="{{ old('nombre', $product->nombre) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Categoría</label>
                                        <select name="categoria" class="form-select">
                                            @foreach(['Alimento', 'Juguetes', 'Accesorios', 'Higiene', 'Ropa'] as $cat)
                                                <option value="{{ $cat }}" {{ $product->categoria == $cat ? 'selected' : '' }}>
                                                    {{ $cat }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Estado</label>
                                        <select name="activo" class="form-select">
                                            <option value="1" {{ $product->activo ? 'selected' : '' }}>🟢 Activo</option>
                                            <option value="0" {{ !$product->activo ? 'selected' : '' }}>🔴 Inactivo</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bold">Descripción</label>
                                        <textarea name="descripcion" class="form-control"
                                            rows="4">{{ old('descripcion', $product->descripcion) }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Precio ($)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" name="precio" class="form-control" required
                                                value="{{ old('precio', $product->precio) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Stock</label>
                                        <input type="number" name="stock" class="form-control" required
                                            value="{{ old('stock', $product->stock) }}">
                                    </div>
                                </div>

                                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                                    <button type="submit" class="btn btn-primary px-4 rounded-pill">
                                        <i class="bi bi-check-lg me-2"></i> Guardar Cambios
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Pequeño script para previsualizar la imagen al seleccionarla
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('preview-img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection