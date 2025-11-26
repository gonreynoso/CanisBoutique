{{-- <header class="bg-white shadow">
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
 --}}


 <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
  <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto p-4">

    <!-- Logo -->
    <a href="/" class="flex items-center space-x-3">
      <span class="self-center text-xl font-bold text-pink-600">Canis Boutique</span>
    </a>

    <!-- Zona derecha: CTA + botón móvil -->
    <div class="inline-flex md:order-2 space-x-3 md:space-x-0">

      <!-- Botón CTA (opcional) -->
      <a href="#contacto"
         class="text-white bg-pink-600 hover:bg-pink-700 border border-transparent px-3 py-2 text-sm rounded-md">
         Reservar turno
      </a>

      <!-- Botón hamburguesa -->
      <button data-collapse-toggle="navbar-menu"
              type="button"
              class="inline-flex items-center p-2 w-9 h-9 justify-center text-gray-700 rounded-md md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
              aria-controls="navbar-menu"
              aria-expanded="false">
          <span class="sr-only">Abrir menú</span>
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
      </button>
    </div>

    <!-- Menú (escritorio + mobile) -->
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
         id="navbar-menu">

      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-200 rounded-md bg-gray-50
                 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">

        <li>
          <a href="#servicios"
             class="block py-2 px-3 text-gray-800 hover:text-pink-600 md:p-0">
             Servicios
          </a>
        </li>

        <li>
          <a href="#productos"
             class="block py-2 px-3 text-gray-800 hover:text-pink-600 md:p-0">
             Productos
          </a>
        </li>

        <li>
          <a href="#contacto"
             class="block py-2 px-3 text-gray-800 hover:text-pink-600 md:p-0">
             Contacto
          </a>
        </li>
      </ul>
    </div>

  </div>
</nav>
