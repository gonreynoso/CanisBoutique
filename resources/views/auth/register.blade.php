<x-guest-layout>
    {{-- Contenedor principal (Fondo suave rosa) --}}
    <div class="min-vh-100 d-flex align-items-center justify-content-center" style="background-color: #fce7f3;">

        {{-- Contenedor Central (Tarjeta Blanca) --}}
        <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 450px;">
            <div class="card-body p-5">

                <div class="text-center mb-4">
                    {{-- Logo --}}
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo_Canis_sin_fondo.png') }}" alt="Logo" class="img-fluid mb-3" style="width: 120px; height: 120px;">
                    </a>
                </div>

                <x-auth-session-status class="mb-3" :status="session('status')" />

                {{-- Botón Registrarse con Google --}}
                <div class="mb-3">
                    <a href="{{ route('auth.google') }}"
                        class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">
                        <img src="{{ asset('images/google_icon.svg') }}" alt="Google" style="width: 20px; height: 20px;">
                        {{ __('Registrarse con Google') }}
                    </a>
                </div>

                {{-- Separador --}}
                <div class="d-flex align-items-center my-3">
                    <hr class="flex-grow-1">
                    <span class="mx-3 text-muted small">{{ __('O registráte con tu e-mail') }}</span>
                    <hr class="flex-grow-1">
                </div>

                {{-- FORMULARIO --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- 1. Email (Según tu orden original) --}}
                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary small">{{ __('E-mail') }}</label>
                        <input id="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autocomplete="username">
                        
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- 2. Nombre --}}
                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary small">{{ __('Nombre') }}</label>
                        <input id="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required 
                               autofocus 
                               autocomplete="name">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- 3. Teléfono --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label text-secondary small">{{ __('Teléfono') }}</label>
                        <input id="phone" 
                               class="form-control @error('phone') is-invalid @enderror" 
                               type="text" 
                               name="phone" 
                               value="{{ old('phone') }}" 
                               required 
                               autocomplete="tel">

                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- 4. Contraseña --}}
                    <div class="mb-3">
                        <label for="password" class="form-label text-secondary small">{{ __('Contraseña') }}</label>
                        <input id="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="new-password">

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- 5. Confirmar Contraseña --}}
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label text-secondary small">{{ __('Confirmar Contraseña') }}</label>
                        <input id="password_confirmation" 
                               class="form-control" 
                               type="password" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password">
                        
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- 6. Términos y Condiciones --}}
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input @error('terms') is-invalid @enderror" 
                                   type="checkbox" 
                                   name="terms" 
                                   id="terms" 
                                   required>
                            
                            <label class="form-check-label small text-secondary" for="terms">
                                {{ __('Acepto los ') }}
                                <a href="#" class="text-decoration-none fw-bold" style="color: #d63384;">
                                    {{ __('Términos y Condiciones') }}
                                </a>
                                {{ __(' y la Política de Privacidad.') }}
                            </label>

                            @error('terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Botón Registrar --}}
                    <div class="d-grid">
                        <button type="submit" class="btn text-white py-2 fw-bold shadow-sm" style="background-color: #d63384; border-color: #d63384;">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    {{-- Enlace de Login --}}
                    <p class="small text-secondary mb-0">
                        ¿Ya tienes cuenta?
                        <a class="text-decoration-none fw-bold" 
                           href="{{ route('login') }}"
                           style="color: #d63384;">
                            Iniciar Sesión
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>