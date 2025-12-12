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
                    <h1 class="h4 text-dark fw-bold">{{ __('Restablecer Contraseña') }}</h1>
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary small">{{ __('E-mail') }}</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                            name="email" value="{{ old('email', $request->email) }}" required autofocus
                            autocomplete="username">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password"
                            class="form-label text-secondary small">{{ __('Nueva Contraseña') }}</label>
                        <input id="password" class="form-control @error('password') is-invalid @enderror"
                            type="password" name="password" required autocomplete="new-password">

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation"
                            class="form-label text-secondary small">{{ __('Confirmar Contraseña') }}</label>
                        <input id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                            name="password_confirmation" required autocomplete="new-password">

                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn text-white py-2 fw-bold shadow-sm"
                            style="background-color: #d63384; border-color: #d63384;">
                            {{ __('Restablecer Contraseña') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>