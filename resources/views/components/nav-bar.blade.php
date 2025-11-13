<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center h-16">
        <!-- Logo -->
        <a href="/" class="text-xl font-bold text-pink-600">
            Canis Boutique
        </a>

        <!-- Botón Hamburguesa (solo en mobile) -->
        <button class="md:hidden text-gray-700 focus:outline-none" id="menu-toggle">
            <!-- Ícono simple -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <!-- Menú Escritorio -->
        <nav class="hidden md:flex gap-6 text-gray-700 font-medium">
            <a href="#servicios" class="hover:text-pink-600">Servicios</a>
            <a href="#productos" class="hover:text-pink-600">Productos</a>
            <a href="#contacto" class="hover:text-pink-600">Contacto</a>
        </nav>
    </div>

    <!-- Menú Mobile -->
    <div class="hidden flex-col gap-4 px-6 pb-4 md:hidden bg-white border-t" id="mobile-menu">
        <a href="#servicios" class="hover:text-pink-600">Servicios</a>
        <a href="#productos" class="hover:text-pink-600">Productos</a>
        <a href="#contacto" class="hover:text-pink-600">Contacto</a>
    </div>
</header>
