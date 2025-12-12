<x-guest-layout>

    {{-- Contenedor principal (Fondo suave) --}}
    {{-- Nota: Bootstrap no tiene bg-pink por defecto. Usamos bg-light o un estilo inline para simularlo --}}
    <div class="min-vh-100 d-flex align-items-center justify-content-center" style="background-color: #fce7f3;">

        {{-- Contenedor Central (Tarjeta Blanca) --}}
        <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 450px;">
            <div class="card-body p-5">

                <div class="text-center mb-4">
                    {{-- Logo --}}
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo_Canis_sin_fondo.png') }}" alt="Logo" class="img-fluid mb-3"
                            style="width: 120px; height: 120px;">
                    </a>

                    {{-- Título --}}
                    <h1 class="h4 text-dark fw-bold">Iniciá sesión en Canis Boutique</h1>
                </div>

                {{-- Status de Sesión --}}
                <x-auth-session-status class="mb-3" :status="session('status')" />

                {{-- Botón para Iniciar Sesión con Google --}}
                <div class="mb-3">
                    <a href="{{ route('auth.google') }}"
                        class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">
                        <img src="{{ asset('images/google_icon.svg') }}" alt="Google"
                            style="width: 20px; height: 20px;">
                        {{ __('Ingresa con Google') }}
                    </a>
                </div>

                {{-- Separador "O ingresa tu email" --}}
                <div class="d-flex align-items-center my-3">
                    <hr class="flex-grow-1">
                    <span class="mx-3 text-muted small">{{ __('O ingresa tu e-mail') }}</span>
                    <hr class="flex-grow-1">
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email Address --}}
                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary small">{{ __('E-mail') }}</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                            name="email" value="{{ old('email') }}" required autofocus autocomplete="username">

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label text-secondary small">{{ __('Contraseña') }}</label>
                        <input id="password" class="form-control @error('password') is-invalid @enderror"
                            type="password" name="password" required autocomplete="current-password">

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Remember Me & Forgot Password --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label small text-secondary" for="remember_me">
                                {{ __('Recordarme') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="text-decoration-none small" href="{{ route('password.request') }}"
                                style="color: #d63384;"> {{-- Color rosa Bootstrap --}}
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>

                    {{-- Botón Login --}}
                    <div class="d-grid">
                        <button type="submit" class="btn text-white py-2 fw-bold shadow-sm"
                            style="background-color: #d63384; border-color: #d63384;">
                            {{ __('Iniciar Sesión') }}
                        </button>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    {{-- Enlace de Registro --}}
                    <p class="small text-secondary mb-0">
                        ¿No tienes cuenta?
                        <a class="text-decoration-none fw-bold" href="{{ route('register') }}" style="color: #d63384;">
                            Regístrate
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>