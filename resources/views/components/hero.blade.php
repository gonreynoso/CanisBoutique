    <section class="relative bg-gray-50">
        <div class="absolute inset-0">
            <img src="{{ asset('images/hero-dog-1.jpg') }}" 
                 alt="Canis Boutique" 
                 class="w-full h-full object-cover opacity-60">
        </div>

        <div class="relative max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center">
            {{-- Texto principal --}}
            <div class="md:w-1/2 text-center md:text-left">
                <div class="text-pink-600 font-semibold flex items-center justify-center md:justify-start gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 11c0 3-2 5-4 5s-4-2-4-5 2-5 4-5 4 2 4 5zM20 11c0 3-2 5-4 5s-4-2-4-5 2-5 4-5 4 2 4 5z"/>
                    </svg>
                    Cuidado profesional para tu mejor amigo
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                    Bienvenido a <span class="text-pink-600">Canis Boutique</span>
                </h1>

                <p class="mt-4 text-gray-700">
                    Tu tienda de confianza donde encontrarás los mejores productos para tu mascota y servicios de peluquería profesional con todo el amor y cuidado que se merece.
                </p>

                <div class="mt-6 flex flex-col md:flex-row gap-3 justify-center md:justify-start">
                    <a href="#peluqueria" 
                       class="bg-pink-600 text-white px-6 py-3 rounded-lg shadow hover:bg-pink-700 transition">
                       Reservar Peluquería
                    </a>
                    <a href="#productos" 
                       class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100 transition">
                       Ver Productos
                    </a>
                </div>

                <div class="mt-10 flex flex-col md:flex-row gap-10 text-center md:text-left">
                    <div>
                        <h3 class="text-2xl font-bold text-pink-600">500+</h3>
                        <p class="text-gray-600 text-sm">Clientes Felices</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-pink-600">5 años</h3>
                        <p class="text-gray-600 text-sm">de Experiencia</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-pink-600">100%</h3>
                        <p class="text-gray-600 text-sm">Satisfacción</p>
                    </div>
                </div>
            </div>
        </div>
    </section>