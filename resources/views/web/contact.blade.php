@extends('layouts.web')

@section('title', 'Contacto - CanisBoutique')

@section('content')



    <section id="contact-2" class="contact-2 section py-5">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 mb-5">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-box h-100 p-4 bg-white shadow-sm rounded-4 text-center border">
                        <div class="icon-box mb-3 text-pink-custom fs-1">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="fw-bold">Nuestra Dirección</h4>
                            <p class="text-muted mb-0">Vera 1450, Villa Crespo</p>
                            <p class="text-muted">CABA, Buenos Aires</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-box h-100 p-4 bg-white shadow-sm rounded-4 text-center border">
                        <div class="icon-box mb-3 text-pink-custom fs-1">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="fw-bold">Email y Teléfono</h4>
                            <p class="text-muted mb-0">contacto@canisboutique.com</p>
                            <p class="text-muted">+54 9 11 8367-2638</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-info-box h-100 p-4 bg-white shadow-sm rounded-4 text-center border">
                        <div class="icon-box mb-3 text-pink-custom fs-1">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="fw-bold">Horarios</h4>
                            <p class="text-muted mb-0">Lun - Vie: 9 AM - 6 PM</p>
                            <p class="text-muted">Sábados: 9 AM - 2 PM</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="map-section position-relative" data-aos="fade-up" data-aos-delay="200"
            style="margin-bottom: -100px; z-index: 1;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.5263708573166!2d-58.4456773!3d-34.590849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5f3f933c863%3A0xe36ba3f1f10fa30b!2sVera%201450%2C%20C1414APD%20Cdad.%20Aut%C3%B3noma%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1765908932410!5m2!1ses-419!2sar"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="container" style="position: relative; z-index: 2; margin-top: 50px;">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-10">
                    <div class="contact-form-wrapper bg-white p-5 rounded-4 shadow-lg">
                        <h2 class="text-center mb-4 fw-bold">Envíanos un mensaje</h2>

                        <form action="" method="POST" class="php-email-form">
                            @csrf <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Tu Nombre" required>
                                        <label for="name">Nombre</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Tu Email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject"
                                            placeholder="Asunto" required>
                                        <label for="subject">Asunto</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Deja tu mensaje aquí" id="message"
                                            name="message" style="height: 150px" required></textarea>
                                        <label for="message">Mensaje</label>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary py-3 px-5 rounded-pill fw-bold"
                                        style="background-color: #d63384; border-color: #d63384;">
                                        ENVIAR MENSAJE
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection