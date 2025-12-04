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
                <h1 class="text-xl font-semibold text-gray-800">¿Olvidaste tu contraseña?</h1>
            </div>



            {{-- Mensaje de Éxito/Ambigüedad (status) --}}
            <x-auth-session-status class="mb-4 font-medium text-center" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email Address --}}
                <div class="mb-4">
                    <x-input-label for="email" :value="__('E-mail')" class="text-sm text-gray-600" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="w-full justify-center bg-pink-600 hover:bg-pink-700 focus:ring-pink-500">
                        {{ __('Enviar') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-4 text-center">
                {{-- Enlace Volver a Iniciar Sesión --}}
                <p class="text-sm text-gray-600">
                    <a class="underline text-pink-600 hover:text-pink-800" href="{{ route('login') }}">
                        Volver a Iniciar Sesión
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>