<x-guest-layout>

    {{-- Contenedor principal de fondo suave --}}
    <div class="absolute inset-0 bg-pink-100 flex items-center justify-center">

        {{-- Contenedor Central (Tarjeta Blanca) --}}
        <div class="w-full max-w-md bg-white shadow-xl rounded-lg p-8">

            <div class="text-center mb-6">
                {{-- Tu logo o marca --}}
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo_Canis_sin_fondo.png') }}" alt="Logo" class="w-32 h-32 mb-4 mx-auto">
                </a>

                {{-- Título --}}
                <h1 class="text-2xl font-semibold text-gray-800">Iniciá sesión en Canis Boutique</h1>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />



            {{-- Botón para Iniciar Sesión con Google --}}
            <div class="mb-4">
                <a href="{{ route('auth.google') }}"
                    class="block w-full text-center py-2 border border-gray-300 rounded-lg shadow-sm text-gray-700 hover:bg-gray-50 transition duration-150">
                    <img src="{{ asset('images/google_icon.svg') }}" alt="Google" class="inline-block w-5 h-5 mr-2">
                    {{ __('Ingresa con Google') }}
                </a>
            </div>

            {{-- Separador "O ingresa tu email" --}}
            <div class="flex items-center justify-center mb-4">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="flex-shrink mx-4 text-gray-500 text-sm">{{ __('O ingresa tu e-mail') }}</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email Address --}}
                <div class="mb-4">
                    <x-input-label for="email" :value="__('E-mail')" class="text-sm text-gray-600" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="mt-4 mb-4">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-sm text-gray-600" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Remember Me & Forgot Password (Mantenemos la estructura de Breeze) --}}
                <div class="block mt-4 flex justify-between items-center">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-pink-600 shadow-sm focus:ring-pink-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-pink-600 hover:text-pink-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                            href="{{ route('password.request') }}">
                            {{ __('Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>

                {{-- Botón Login --}}
                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="w-full justify-center bg-pink-600 hover:bg-pink-700 focus:ring-pink-500">
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-4 text-center">
                {{-- Enlace de Registro --}}
                <p class="text-sm text-gray-600">
                    ¿No tienes cuenta?
                    <a class="underline text-pink-600 hover:text-pink-800" href="{{ route('register') }}">
                        Regístrate
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>