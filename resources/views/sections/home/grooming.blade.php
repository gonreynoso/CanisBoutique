<section id="servicios" class="py-5 bg-white">
  <div class="container">

    {{-- ENCABEZADO --}}
    <div class="text-center mb-5">
      <span class="badge rounded-pill text-bg-light text-pink-custom px-3 py-2 border mb-3">
        <i class="bi bi-stars me-1"></i> Nuestros Servicios
      </span>
      <h2 class="display-5 fw-bold text-dark">Peluquería Canina</h2>
      <p class="text-secondary lead">
        Estética profesional con productos de primera calidad.
      </p>
    </div>



    {{-- GRID DE TARJETAS --}}
    <div class="row g-4">

      {{-- SERVICIO 1: Corte --}}
      <div class="col-12 col-md-4">
        {{-- Agregamos h-100 para que la tarjeta ocupe todo el alto de la columna --}}
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden service-card">

          {{-- CLAVE 1: d-flex flex-column para manejar el espacio vertical --}}
          <div class="card-body p-4 text-center d-flex flex-column">

            <div class="icon-circle mx-auto mb-4 d-flex align-items-center justify-content-center">
              <i class="bi bi-scissors fs-2 text-white"></i>
            </div>

            <h3 class="h4 fw-bold mb-2">Corte y Peinado</h3>
            <p class="text-secondary small mb-3">
              Adaptado a la raza y estilo de tu mascota para que luzca increíble.
            </p>

            <div class="price-tag mb-4">
              <span class="small text-muted">Desde</span>
              <span class="fs-3 fw-bold text-dark">$15.000</span>
            </div>

            <ul class="list-unstyled text-start small mb-4 bg-light p-3 rounded-3">
              <li class="mb-2"><i class="bi bi-check-circle-fill text-pink-custom me-2"></i>Corte de raza</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-pink-custom me-2"></i>Peinado pro</li>
              <li class="mb-0"><i class="bi bi-check-circle-fill text-pink-custom me-2"></i>Limado de uñas</li>
            </ul>

            {{-- CLAVE 2: mt-auto empuja el botón al fondo --}}
            <a href="{{ route('web.reservar') }}" class="btn btn-pink-custom w-100 py-2 fw-bold rounded-3 mt-auto">
              Reservar Turno
            </a>
          </div>
        </div>
      </div>

      {{-- SERVICIO 2: Baño --}}
      <div class="col-12 col-md-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden service-card">

          <div class="card-body p-4 text-center d-flex flex-column">
            <div class="icon-circle mx-auto mb-4 d-flex align-items-center justify-content-center">
              <i class="bi bi-droplet-fill fs-2 text-white"></i>
            </div>

            <h3 class="h4 fw-bold mb-2">Baño Completo</h3>
            <p class="text-secondary small mb-3">
              Baño relajante, limpieza profunda y secado con turbina.
            </p>

            <div class="price-tag mb-4">
              <span class="small text-muted">Desde</span>
              <span class="fs-3 fw-bold text-dark">$9.000</span>
            </div>

            <ul class="list-unstyled text-start small mb-4 bg-light p-3 rounded-3">
              <li class="mb-2"><i class="bi bi-check-circle-fill text-pink-custom me-2"></i>Shampoo Premium</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-pink-custom me-2"></i>Acondicionador</li>
              <li class="mb-0"><i class="bi bi-check-circle-fill text-pink-custom me-2"></i>Secado total</li>
            </ul>

            <a href="{{ route('web.reservar') }}" class="btn btn-pink-custom w-100 py-2 fw-bold rounded-3 mt-auto">
              Reservar Turno
            </a>
          </div>
        </div>
      </div>

      {{-- SERVICIO 3: Cepillado --}}
      <div class="col-12 col-md-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden service-card">

          <div class="card-body p-4 text-center d-flex flex-column">
            <div class="icon-circle mx-auto mb-4 d-flex align-items-center justify-content-center">
              <i class="bi bi-magic fs-2 text-white"></i>
            </div>

            <h3 class="h4 fw-bold mb-2">Cepillado</h3>
            <p class="text-secondary small mb-3">
              Eliminación de nudos y lana muerta para un pelaje sano.
            </p>

            <div class="price-tag mb-4">
              <span class="small text-muted">Desde</span>
              <span class="fs-3 fw-bold text-dark">$3.000</span>
            </div>

            <ul class="list-unstyled text-start small mb-4 bg-light p-3 rounded-3">
              <li class="mb-2"><i class="bi bi-check-circle-fill text-pink-custom me-2"></i>Desenredado</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-pink-custom me-2"></i>Cardina suave</li>
              <li class="mb-0"><i class="bi bi-check-circle-fill text-pink-custom me-2"></i>Spray brillo</li>
            </ul>

            <a href="{{ route('web.reservar') }}" class="btn btn-outline-pink w-100 py-2 fw-bold rounded-3 mt-auto">
              Reservar Turno
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



{{-- ESTILOS CSS --}}
<style>
  /* Definición de variables locales para fácil ajuste */
  :root {
    --canis-pink: #d63384;
    --canis-pink-hover: #b02a67;
  }

  /* Clases de utilidad para color rosa */
  .text-pink-custom {
    color: var(--canis-pink) !important;
  }

  .btn-pink-custom {
    background-color: var(--canis-pink);
    border-color: var(--canis-pink);
    color: white;
  }

  .btn-pink-custom:hover {
    background-color: var(--canis-pink-hover);
    border-color: var(--canis-pink-hover);
    color: white;
  }

  .btn-outline-pink {
    color: var(--canis-pink);
    border-color: var(--canis-pink);
    background-color: transparent;
  }

  .btn-outline-pink:hover {
    background-color: var(--canis-pink);
    color: white;
  }

  /* Diseño del Círculo del Ícono */
  .icon-circle {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #d63384 0%, #f8a5c2 100%);
    border-radius: 50%;
    box-shadow: 0 4px 10px rgba(214, 51, 132, 0.3);
  }

  /* Efecto Hover en la Tarjeta */
  .service-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 1rem 3rem rgba(0, 0, 0, .1) !important;
  }
</style>