<section id="contacto" class="py-20 bg-[#f3f4f6]">

    <!-- TÍTULO -->
    <div class="text-center mb-10">
        <h2 class="text-4xl font-semibold text-[#6F4E37]">
            Contáctanos
        </h2>
    </div>

    <div class="container mx-auto px-4">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 ">

            <!-- FORMULARIO IZQUIERDA -->
            <div class="bg-[#FFF1D6] rounded-2xl shadow-md p-8">

                <h4 class="text-xl font-semibold text-[#6F4E37] mb-6">
                    ¡Envíanos un mensaje!
                </h4>

                <form class="space-y-4">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm text-[#6F4E37]">Nombre*</label>
                            <input type="text"
                                   class="w-full border border-[#d9c8b4] rounded-lg px-3 py-2 focus:border-pink-400 focus:ring-pink-300 focus:ring-2">
                        </div>

                        <div>
                            <label class="text-sm text-[#6F4E37]">Correo electrónico*</label>
                            <input type="email"
                                   class="w-full border border-[#d9c8b4] rounded-lg px-3 py-2 focus:border-pink-400 focus:ring-pink-300 focus:ring-2">
                        </div>
                    </div>

                    <div>
                        <label class="text-sm text-[#6F4E37]">Asunto</label>
                        <input type="text"
                               class="w-full border border-[#d9c8b4] rounded-lg px-3 py-2 focus:border-pink-400 focus:ring-pink-300 focus:ring-2">
                    </div>

                    <div>
                        <label class="text-sm text-[#6F4E37]">Mensaje*</label>
                        <textarea rows="4"
                                  class="w-full border border-[#d9c8b4] rounded-lg px-3 py-2 focus:border-pink-400 focus:ring-pink-300 focus:ring-2"></textarea>
                    </div>

                    <button type="submit"
                            class="px-6 py-2 rounded-full text-white bg-pink-400 hover:bg-pink-500 shadow">
                        ENVIAR MENSAJE
                    </button>

                </form>
            </div>

            <!-- MAPA DERECHA -->
            <div class="rounded-2xl overflow-hidden shadow-md">
                <div class="w-full h-[420px]">
                    <img src="{{ asset('images/maps.png') }}"
                        alt="Mapa"
                        class="w-full h-full object-cover">
                </div>
            </div>

        </div>

        <!-- TARJETAS INFERIORES -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-16">

            <!-- EMAIL -->
            <div class="bg-white border border-[#F3E7D9] rounded-xl py-8 text-center">
                <div class="text-pink-400 text-3xl mb-3">
                    <i class="fa fa-envelope"></i>
                </div>
                <h5 class="text-lg text-[#6F4E37] mb-1">Envíanos un correo</h5>
                <p class="text-pink-400 font-semibold">contacto@canisboutique.com</p>
            </div>

            <!-- UBICACIÓN -->
            <div class="bg-white border border-[#F3E7D9] rounded-xl py-8 text-center">
                <div class="text-pink-400 text-3xl mb-3">
                    <i class="fa fa-map-marker"></i>
                </div>
                <h5 class="text-lg text-[#6F4E37] mb-1">Ubicación</h5>
                <p>Vera 1450 - Villa Crespo - Caba</p>
            </div>

            <!-- TELÉFONO -->
            <div class="bg-white border border-[#F3E7D9] rounded-xl py-8 text-center">
                <div class="text-pink-400 text-3xl mb-3">
                    <i class="fa fa-phone"></i>
                </div>
                <h5 class="text-lg text-[#6F4E37] mb-1">Whatsapp</h5>
                <p>011 83672638</p>
            </div>

            <!-- REDES SOCIALES -->
            <div class="bg-white border border-[#F3E7D9] rounded-xl py-8 text-center">
                <div class="text-pink-400 text-3xl mb-3">
                    <i class="fa fa-heart"></i>
                </div>
                <h5 class="text-lg text-[#6F4E37] mb-1">Síguenos en redes</h5>
                <div class="flex justify-center gap-6 mt-3">

                    <a href="#" class="hover:opacity-70">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg"
                            class="w-6 h-6" alt="Facebook">
                    </a>

                    <a href="#" class="hover:opacity-70">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg"
                            class="w-6 h-6" alt="Instagram">
                    </a>

                    <a href="#" class="hover:opacity-70">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg"
                            class="w-6 h-6" alt="Twitter">
                    </a>

                    <a href="#" class="hover:opacity-70">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/pinterest.svg"
                            class="w-6 h-6" alt="Pinterest">
                    </a>

                </div>

            </div>
    </div>

</section>
