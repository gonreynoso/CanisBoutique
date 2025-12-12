<x-guest-layout>
    {{-- Contenedor principal (Fondo suave rosa) --}}
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
                    <h1 class="h4 text-dark fw-bold">{{ __('¿Olvidaste tu contraseña?') }}</h1>

                    {{-- Texto explicativo opcional (Breeze suele traerlo, si quieres agregarlo se vería bien aquí) --}}
                    <p class="text-muted small mt-2">
                        {{ __('Indícanos tu e-mail y te enviaremos un enlace para recuperar el acceso.') }}
                    </p>
                </div>

                {{-- Reemplazo Técnico: Alerta nativa de Bootstrap en lugar del componente de Breeze --}}
                @if (session('status'))
                    <div class="alert alert-success mb-3 text-center small" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- Email Address --}}
                    <div class="mb-4">
                        <label for="email" class="form-label text-secondary small">{{ __('E-mail') }}</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                            name="email" value="{{ old('email') }}" required autofocus>

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botón Enviar --}}
                    <div class="d-grid">
                        <button type="submit" class="btn text-white py-2 fw-bold shadow-sm"
                            style="background-color: #d63384; border-color: #d63384;">
                            {{ __('Enviar Enlace') }}
                        </button>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    {{-- Enlace Volver --}}
                    <p class="small text-secondary mb-0">
                        <a class="text-decoration-none fw-bold" href="{{ route('login') }}" style="color: #d63384;">
                            Volver a Iniciar Sesión
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>