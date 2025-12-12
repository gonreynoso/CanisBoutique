<section id="productos" class="bg-light py-5">
  <div class="container">

    {{-- Encabezado de la Sección --}}
    <div class="text-center mb-5">
      <div class="d-flex align-items-center justify-content-center gap-2 mb-2 fw-semibold" style="color: #d63384;">
        <i class="bi bi-paw-fill"></i>
        <span>Nuestra Tienda</span>
      </div>

      <h2 class="display-5 fw-bold text-dark mb-3">
        Productos de Calidad para tu Mascota
      </h2>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <p class="text-secondary lead fs-6">
            Seleccionamos cuidadosamente los mejores productos para el bienestar y felicidad de tu compañero.
          </p>
        </div>
      </div>
    </div>

    {{-- Grid de Productos --}}
    <div class="row g-4"> {{-- g-4 da un espaciado consistente entre tarjetas --}}

      @foreach ($productos as $producto)
        {{-- Columna: 1 en móvil (col-12), 3 en desktop (col-md-4) --}}
        <div class="col-12 col-md-6 col-lg-4">

          {{-- Tarjeta (Card) --}}
          <div class="card h-100 border shadow-sm rounded-4 overflow-hidden product-card-transition">

            {{-- Imagen con Badge superpuesto --}}
            <div class="position-relative">
              {{-- Fijamos altura (height: 250px) para que todas las cajas sean iguales --}}
              <img src="{{ asset('images/' . $producto['imagen']) }}" alt="{{ $producto['titulo'] }}"
                class="card-img-top w-100" style="height: 250px; object-fit: cover;">

              <span class="position-absolute top-0 start-0 m-3 badge rounded-pill text-white shadow-sm"
                style="background-color: #d63384;">
                {{ $producto['etiqueta'] }}
              </span>
            </div>

            {{-- Cuerpo de la Tarjeta --}}
            <div class="card-body p-4 text-start d-flex flex-column">
              <h5 class="card-title fw-bold mb-2">{{ $producto['titulo'] }}</h5>

              {{-- Descripción (flex-grow para empujar el precio y botón al fondo si el texto es corto) --}}
              <p class="card-text text-secondary small mb-3 flex-grow-1">
                {{ $producto['descripcion'] }}
              </p>

              {{-- Precio y Rating --}}
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold fs-5" style="color: #d63384;">
                  ${{ number_format($producto['precio'], 2) }}
                </span>
                <span class="text-warning small fw-bold">
                  <i class="bi bi-star-fill me-1"></i>{{ $producto['rating'] }}
                </span>
              </div>

              {{-- Botón --}}
              <button class="btn text-white fw-bold w-100 py-2 rounded-3 btn-pink-hover"
                style="background-color: #d63384; border-color: #d63384;">
                Añadir al Carrito
              </button>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>

{{-- Estilos para las transiciones (Hover effect) --}}
<style>
  /* Efecto al pasar el mouse por la tarjeta completa */
  .product-card-transition {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .product-card-transition:hover {
    transform: translateY(-5px);
    /* Se eleva un poco */
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
    /* Sombra más fuerte (shadow-lg) */
  }

  /* Efecto del botón al pasar el mouse */
  .btn-pink-hover:hover {
    background-color: #b02a67 !important;
    /* Un rosa un poco más oscuro */
    border-color: #b02a67 !important;
  }
</style>