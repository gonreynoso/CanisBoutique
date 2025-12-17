@extends('layouts.web')

@section('title', 'Reservar Turno - CanisBoutique')

@section('content')



    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header text-center py-4 m-5" style="background-color: #d63384;">
                        <h3 class="mb-1 fw-bold text-white">
                            <i class="bi bi-calendar2-heart"></i> Reservar Turno
                        </h3>
                        <p class="mb-0 text-white">Completa el formulario para agendar tu cita de peluquería.</p>
                    </div>

                    <div class="card-body p-4 p-md-5 bg-white">


                        @if(session('error'))
                            <div class="alert alert-danger rounded-3 shadow-sm border-0 mb-4">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success rounded-3 shadow-sm border-0 mb-4">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('web.reservar.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <h5 class="text-secondary fw-bold mb-3 d-flex align-items-center">
                                    <span class="badge bg-light text-dark border me-2 rounded-circle">1</span>
                                    Detalles del Servicio
                                </h5>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Servicio</label>
                                        <select name="servicio_id"
                                            class="form-select py-2 @error('servicio_id') is-invalid @enderror" required>
                                            <option value="" disabled selected>Selecciona un servicio...</option>
                                            @foreach($servicios as $servicio)
                                                <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }}>
                                                    {{ $servicio->nombre }} -
                                                    ${{ number_format($servicio->precio, 0, ',', '.') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('servicio_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold">Fecha</label>
                                        <input type="date" name="fecha"
                                            class="form-control py-2 @error('fecha') is-invalid @enderror"
                                            value="{{ old('fecha') }}" min="{{ date('Y-m-d') }}" required>
                                        @error('fecha') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold">Hora</label>
                                        <select name="hora" class="form-select py-2 @error('hora') is-invalid @enderror"
                                            required>
                                            <option value="" disabled selected>Elegir...</option>
                                            @for($i = 9; $i <= 18; $i++)
                                                @php $hora = str_pad($i, 2, '0', STR_PAD_LEFT) . ':00'; @endphp
                                                <option value="{{ $hora }}" {{ old('hora') == $hora ? 'selected' : '' }}>
                                                    {{ $hora }}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('hora') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 border-light">

                            <div class="mb-4">
                                <h5 class="text-secondary fw-bold mb-3 d-flex align-items-center">
                                    <span class="badge bg-light text-dark border me-2 rounded-circle">2</span>
                                    Datos de tu Canino
                                </h5>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Nombre del peludo</label>
                                        <input type="text" name="mascota_nombre" class="form-control py-2"
                                            value="{{ old('mascota_nombre') }}" placeholder="Ej: Firulais" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Tipo</label>
                                        <input type="text" name="mascota_tipo" class="form-control bg-light py-2"
                                            value="Perros únicamente" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 border-light">

                            <div class="mb-4">
                                <h5 class="text-secondary fw-bold mb-3 d-flex align-items-center">
                                    <span class="badge bg-light text-dark border me-2 rounded-circle">3</span>
                                    Tus Datos de Contacto
                                </h5>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nombre Completo</label>
                                    <input type="text" name="cliente_nombre"
                                        class="form-control py-2 @error('cliente_nombre') is-invalid @enderror"
                                        value="{{ old('cliente_nombre') }}" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                        title="Solo se permiten letras y espacios" required>
                                    @error('cliente_nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="email" name="cliente_email"
                                            class="form-control py-2 @error('cliente_email') is-invalid @enderror"
                                            value="{{ old('cliente_email') }}" required>
                                        @error('cliente_email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Teléfono / WhatsApp</label>
                                        <input type="tel" name="cliente_telefono"
                                            class="form-control py-2 @error('cliente_telefono') is-invalid @enderror"
                                            value="{{ old('cliente_telefono') }}"
                                            placeholder="Solo números (Ej: 1122334455)"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                        @error('cliente_telefono') <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-primary py-3 fw-bold fs-5 shadow-sm btn-reservar"
                                    style="background-color: #d63384; border-color: #d63384;">
                                    Confirmar Reserva <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="text-center mt-4 text-muted small">
                    <i class="bi bi-shield-lock"></i> Tus datos están protegidos y solo se usarán para contactarte sobre tu
                    turno.
                </div>

            </div>
        </div>
    </div>

    <style>
        .btn-reservar:hover {
            background-color: #b02a67 !important;
            border-color: #b02a67 !important;
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
    </style>

@endsection