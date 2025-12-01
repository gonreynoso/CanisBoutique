<header id="dynamic-header" class="fixed w-full z-20 top-0 start-0">

    <div id="top-bar"
        class="bg-gray-900 border-b border-gray-700 py-2 transition-transform duration-300 ease-in-out translate-y-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end items-center space-x-4">

            @if (Route::has('login'))
                @auth
                    {{-- ----------------------------------------------------- --}}
                    {{-- ESTADO: USUARIO LOGUEADO --}}
                    {{-- ----------------------------------------------------- --}}

                    {{-- Enlaces a la gestión del proyecto --}}
                    <a href="{{ route('products.index') }}" class="text-xs text-pink-600 hover:text-pink-800 font-medium">
                        Gestión de Productos
                    </a>

                    {{-- Botón Cerrar Sesión (Se mantiene visible) --}}
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-2 py-1 text-xs rounded-md">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    {{-- ----------------------------------------------------- --}}
                    {{-- ESTADO: USUARIO NO LOGUEADO --}}
                    {{-- ----------------------------------------------------- --}}

                    {{-- Enlaces Login y Register --}}
                    <a href="{{ route('login') }}" class="text-xs text-white hover:text-pink-600 font-medium">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-xs text-white hover:text-pink-600 font-medium">
                            Registro
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <nav id="main-nav" class="bg-white border-b border-gray-200 shadow-md">
        <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto p-4">

            <a href="/" class="flex items-center space-x-3">
                <span class="self-center text-xl font-bold text-pink-600">Canis Boutique</span>
            </a>

            <div class="inline-flex md:order-2 space-x-3 md:space-x-0 items-center">

                {{-- Botón CTA (solo visible para no logueados o si es el CTA principal) --}}
                @guest
                    <a href="#contacto"
                        class="text-white bg-pink-600 hover:bg-pink-700 border border-transparent px-3 py-2 text-sm rounded-md">
                        Reservar turno
                    </a>
                @endguest

                <button data-collapse-toggle="navbar-menu" type="button"
                    class="inline-flex items-center p-2 w-9 h-9 justify-center text-gray-700 rounded-md md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    aria-controls="navbar-menu" aria-expanded="false">
                    <span class="sr-only">Abrir menú</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-menu">

                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-200 rounded-md bg-gray-50
                     md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">

                    <li><a href="#servicios"
                            class="block py-2 px-3 text-gray-800 hover:text-pink-600 md:p-0">Servicios</a></li>
                    <li><a href="#productos"
                            class="block py-2 px-3 text-gray-800 hover:text-pink-600 md:p-0">Productos</a></li>

                    {{-- Enlace de Gestión AÑADIDO para usuarios logueados --}}
                    @auth
                        <li>
                            <a href="{{ route('products.index') }}"
                                class="block py-2 px-3 text-gray-800 hover:text-pink-600 md:p-0">
                                Gestión de Tienda
                            </a>
                        </li>
                    @endauth

                    <li><a href="#contacto"
                            class="block py-2 px-3 text-gray-800 hover:text-pink-600 md:p-0">Contacto</a></li>
                </ul>
            </div>

        </div>
    </nav>
</header>