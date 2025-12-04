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
                <h1 class="text-2xl font-semibold text-gray-800">Creá tu cuenta</h1>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- FORMULARIO COMPLETO --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- 2. Email Address --}}
                <div class="mb-4">
                    <x-input-label for="email" :value="__('E-mail')" class="text-sm text-gray-600" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- 1. Name --}}
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nombre')" class="text-sm text-gray-600" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    {{-- ESTO MUESTRA EL MENSAJE DE ERROR DEL BACKEND --}}
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- 1. Teléfono --}}
                <div class="mb-4">
                    <x-input-label for="phone" :value="__('Teléfono')" class="text-sm text-gray-600" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                        required autofocus autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>



                {{-- 3. Password --}}
                <div class="mt-4 mb-4">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-sm text-gray-600" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- 4. Confirm Password --}}
                <div class="mt-4 mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')"
                        class="text-sm text-gray-600" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                {{-- 5. Términos y Condiciones --}}
                <div class="mt-4 flex items-start">
                    <div class="flex items-center h-5">
                        {{-- Checkbox estándar de Breeze con estilo de Tailwind --}}
                        <input id="terms" name="terms" type="checkbox" required
                            class="focus:ring-pink-500 h-4 w-4 text-pink-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <x-input-label for="terms">
                            {{ __('Acepto los ') }}
                            <a href="#" class="underline text-pink-600 hover:text-pink-800 font-medium">
                                {{ __('Términos y Condiciones') }}
                            </a>
                            {{ __(' y la Política de Privacidad.') }}
                        </x-input-label>
                        <x-input-error :messages="$errors->get('terms')" class="mt-2" />
                    </div>
                </div>

                {{-- Botón Registrar --}}
                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="w-full justify-center bg-pink-600 hover:bg-pink-700 focus:ring-pink-500">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-4 text-center">
                {{-- Enlace de Login --}}
                <p class="text-sm text-gray-600">
                    ¿Ya tienes cuenta?
                    <a class="underline text-pink-600 hover:text-pink-800" href="{{ route('login') }}">
                        Iniciar Sesión
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>