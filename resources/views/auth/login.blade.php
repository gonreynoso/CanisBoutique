{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

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