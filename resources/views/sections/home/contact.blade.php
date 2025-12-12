<section id="contacto" class="py-5" style="background-color: #f3f4f6;">

    {{-- TÍTULO --}}
    <div class="text-center mb-5">
        <h2 class="display-5 fw-bold" style="color: #6F4E37;">
            Contáctanos
        </h2>
    </div>

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-6">
                <div class="rounded-4 shadow p-4 p-md-5 h-100" style="background-color: #FFF1D6;">

                    <h4 class="h4 fw-bold mb-4" style="color: #6F4E37;">
                        ¡Envíanos un mensaje!
                    </h4>

                    <form>
                        <div class="row g-3">
                            {{-- Nombre --}}
                            <div class="col-md-6">
                                <label class="form-label small fw-bold" style="color: #6F4E37;">Nombre*</label>
                                <input type="text" class="form-control form-control-coffee">
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label class="form-label small fw-bold" style="color: #6F4E37;">Correo
                                    electrónico*</label>
                                <input type="email" class="form-control form-control-coffee">
                            </div>

                            {{-- Asunto --}}
                            <div class="col-12">
                                <label class="form-label small fw-bold" style="color: #6F4E37;">Asunto</label>
                                <input type="text" class="form-control form-control-coffee">
                            </div>

                            {{-- Mensaje --}}
                            <div class="col-12">
                                <label class="form-label small fw-bold" style="color: #6F4E37;">Mensaje*</label>
                                <textarea rows="4" class="form-control form-control-coffee"></textarea>
                            </div>

                            {{-- Botón Enviar --}}
                            <div class="col-12 mt-4">
                                <button type="submit"
                                    class="btn text-white fw-bold px-4 py-2 rounded-pill shadow-sm w-100 w-md-auto btn-pink-hover"
                                    style="background-color: #d63384; border-color: #d63384;">
                                    ENVIAR MENSAJE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden shadow h-100">
                    {{-- Usamos h-100 para que el mapa tenga la misma altura que el formulario --}}
                    <img src="{{ asset('images/maps.png') }}" alt="Mapa" class="w-100 h-100"
                        style="object-fit: cover; min-height: 400px;">
                </div>
            </div>

        </div>

        <div class="row g-4 mt-4">

            <div class="col-12 col-md-6">
                <div class="bg-white border rounded-4 py-4 px-3 text-center h-100 shadow-sm"
                    style="border-color: #F3E7D9 !important;">
                    <div class="fs-1 mb-2" style="color: #d63384;">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-1" style="color: #6F4E37;">Envíanos un correo</h5>
                    <p class="fw-semibold mb-0" style="color: #d63384;">contacto@canisboutique.com</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="bg-white border rounded-4 py-4 px-3 text-center h-100 shadow-sm"
                    style="border-color: #F3E7D9 !important;">
                    <div class="fs-1 mb-2" style="color: #d63384;">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-1" style="color: #6F4E37;">Ubicación</h5>
                    <p class="text-secondary mb-0">Vera 1450 - Villa Crespo - CABA</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="bg-white border rounded-4 py-4 px-3 text-center h-100 shadow-sm"
                    style="border-color: #F3E7D9 !important;">
                    <div class="fs-1 mb-2" style="color: #d63384;">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <h5 class="fw-bold mb-1" style="color: #6F4E37;">Whatsapp</h5>
                    <p class="text-secondary mb-0">011 83672638</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="bg-white border rounded-4 py-4 px-3 text-center h-100 shadow-sm"
                    style="border-color: #F3E7D9 !important;">
                    <div class="fs-1 mb-2" style="color: #d63384;">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-1" style="color: #6F4E37;">Síguenos en redes</h5>

                    <div class="d-flex justify-content-center gap-4 mt-3">
                        <a href="#" class="text-secondary fs-4 social-hover"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-secondary fs-4 social-hover"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-secondary fs-4 social-hover"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-secondary fs-4 social-hover"><i class="bi bi-pinterest"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- Estilos personalizados para los Inputs color café --}}
<style>
    /* Estilo especial para los inputs de este formulario */
    .form-control-coffee {
        border-color: #d9c8b4;
        background-color: white;
    }

    .form-control-coffee:focus {
        border-color: #d63384;
        /* Borde rosa al hacer click */
        box-shadow: 0 0 0 0.25rem rgba(214, 51, 132, 0.25);
        /* Resplandor rosa */
    }

    /* Hover para redes sociales */
    .social-hover:hover {
        color: #d63384 !important;
        transition: color 0.3s ease;
    }

    /* Reutilizamos hover del botón */
    .btn-pink-hover:hover {
        background-color: #b02a67 !important;
        border-color: #b02a67 !important;
    }
</style>