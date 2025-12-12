<section id="testimonios" class="bg-white py-5">
  <div class="container">

    {{-- Encabezado --}}
    <div class="text-center mb-5">
      <div class="d-flex align-items-center justify-content-center gap-2 mb-2 fw-semibold" style="color: #d63384;">
        {{-- Usamos un ícono de chat/corazón para variar --}}
        <i class="bi bi-chat-heart-fill"></i>
        <span>Opiniones de Clientes</span>
      </div>

      <h2 class="display-5 fw-bold text-dark mb-4">
        Lo que Dicen Nuestros Clientes
      </h2>
    </div>

    {{-- Grid de Testimonios --}}
    <div class="row g-4">

      @foreach ($testimonials as $t)
        {{-- Columna: 1 en móvil, 3 en desktop --}}
        <div class="col-12 col-md-4">

          {{-- Tarjeta --}}
          <div class="card h-100 border rounded-4 p-4 shadow-sm testimonial-card text-center">

            {{-- Ícono decorativo de comillas --}}
            <div class="mb-2 text-secondary opacity-25">
              <i class="bi bi-quote fs-1"></i>
            </div>

            {{-- Texto --}}
            <p class="card-text text-secondary fst-italic mb-4 leading-relaxed">
              “{{ $t['texto'] }}”
            </p>

            {{-- Estrellas (Lógica mejorada con íconos) --}}
            <div class="text-warning mb-3 small">
              @for ($i = 0; $i < $t['estrellas']; $i++)
                <i class="bi bi-star-fill mx-1"></i>
              @endfor
              {{-- Si quisieras mostrar estrellas vacías para completar 5, podrías agregar otro loop aquí --}}
            </div>

            {{-- Nombre del Cliente --}}
            <div class="mt-auto">
              <h6 class="fw-bold text-dark mb-0 tracking-tight">
                {{ $t['nombre'] }}
              </h6>
            </div>

          </div>
        </div>
      @endforeach

    </div>

  </div>
</section>

{{-- Estilos para la animación hover --}}
<style>
  .testimonial-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #fff;
  }

  .testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .08) !important;
    border-color: #fce7f3 !important;
    /* Borde rosa suave al pasar el mouse */
  }
</style>