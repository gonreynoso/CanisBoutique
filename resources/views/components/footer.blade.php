<footer class="bg-dark text-light py-5 mt-auto">
    <div class="container">
        <div class="row gy-5"> {{-- gy-5 da espacio vertical entre filas en móviles --}}

            <div class="col-12 col-sm-6 col-md-3">
                <img src="{{ asset('images/logo_Canis_sin_fondo.png') }}" alt="Logo" class="img-fluid"
                    style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 1rem;">

                <p class="small text-secondary">
                    Tu tienda de confianza para productos premium y servicios de peluquería canina.
                    Amor y cuidado para tu mejor amigo 🐾
                </p>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <h6 class="fw-bold text-white mb-3">Productos</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Alimentos</a>
                    </li>
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Accesorios</a>
                    </li>
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Juguetes</a>
                    </li>
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Higiene</a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <h6 class="fw-bold text-white mb-3">Servicios</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Peluquería</a>
                    </li>
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Baños
                            especiales</a></li>
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Spa
                            canino</a></li>
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Cuidado
                            dental</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <h6 class="fw-bold text-white mb-3">Contacto</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Sobre
                            nosotros</a></li>
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Preguntas
                            frecuentes</a></li>
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Política de
                            privacidad</a></li>
                    <li class="mb-2"><a href="#"
                            class="text-decoration-none text-secondary custom-hover-pink transition-colors">Términos y
                            condiciones</a></li>
                </ul>
            </div>
        </div>

        <div class="border-top border-secondary mt-5 pt-4 text-center small text-secondary">
            © {{ date('Y') }} Canis Boutique. Todos los derechos reservados.
        </div>
    </div>
</footer>

{{-- Estilos adicionales (si no los pusiste ya en app.scss o el layout) --}}
<style>
    /* Efecto transición suave */
    .transition-colors {
        transition: color 0.3s ease;
    }

    /* Reutilizamos el hover rosa del Header */
    .custom-hover-pink:hover {
        color: #d63384 !important;
    }
</style>