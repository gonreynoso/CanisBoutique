<section class="position-relative bg-light overflow-hidden">

    {{-- 1. IMAGEN DE FONDO (Absolute) --}}
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <img src="{{ asset('images/pet-grooming-at-home-scaled-1.jpg') }}" alt="Canis Boutique" class="w-100 h-100"
            style="object-fit: cover; opacity: 0.7;">
        {{-- opacity-70 permite que el texto se lea mejor si la imagen es oscura/clara --}}
    </div>

    {{-- 2. CONTENIDO (Relative para estar encima de la imagen) --}}
    <div class="container position-relative py-5">
        <div class="row align-items-center min-vh-75"> {{-- min-vh-75 da buena altura al hero --}}

            {{-- Columna de Texto --}}
            <div class="col-12 col-md-8 col-lg-6 text-center text-md-start py-5">

                {{-- Badge / Subtítulo --}}
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mb-3 fw-semibold"
                    style="color: #d63384;">
                    <i class="bi bi-paw-fill fs-5"></i>
                    <span>Cuidado profesional para tu mejor amigo</span>
                </div>

                {{-- Título Principal --}}
                <h1 class="display-4 fw-bold text-dark lh-1 mb-4">
                    Bienvenido a <span style="color: #d63384;">Canis Boutique</span>
                </h1>

                {{-- Párrafo --}}
                <p class="lead text-secondary mb-4">
                    Tu tienda de confianza donde encontrarás los mejores productos para tu mascota y servicios de
                    peluquería profesional con todo el amor y cuidado que se merece.
                </p>

                {{-- Botones de Acción --}}
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center justify-content-md-start">

                    <a href="#peluqueria" class="btn text-white fw-bold px-4 py-3 shadow-sm rounded-3"
                        style="background-color: #d63384; border-color: #d63384;">
                        Reservar Peluquería
                    </a>

                    <a href="#productos"
                        class="btn btn-white bg-white border px-4 py-3 rounded-3 fw-medium btn-hover-pink shadow-sm">
                        Ver Productos
                    </a>
                </div>

                {{-- Estadísticas --}}
                <div
                    class="mt-5 d-flex flex-column flex-md-row gap-4 gap-md-5 justify-content-center justify-content-md-start">
                    <div>
                        <h3 class="fw-bold mb-0" style="color: #d63384;">500+</h3>
                        <p class="text-secondary small mb-0">Clientes Felices</p>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-0" style="color: #d63384;">5 años</h3>
                        <p class="text-secondary small mb-0">de Experiencia</p>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-0" style="color: #d63384;">100%</h3>
                        <p class="text-secondary small mb-0">Satisfacción</p>
                    </div>
                </div>

            </div>
            {{-- Fin Columna Texto --}}
        </div>
    </div>
</section>

{{-- Estilos para el hover del botón secundario --}}
<style>
    .btn-hover-pink:hover {
        background-color: #d63384 !important;
        color: white !important;
        border-color: #d63384 !important;
        transition: all 0.3s ease;
    }
</style>