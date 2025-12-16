<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Turno - CanisBoutique</title>
    
    {{-- Importamos Bootstrap 5 desde internet (CDN) para que se vea bien --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    {{-- BARRA DE NAVEGACIÓN SIMULADA (Opcional) --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('web.index') }}">CanisBoutique</a>
        </div>
    </nav>

    {{-- AQUÍ EMPIEZA EL CONTENIDO PRINCIPAL --}}
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white text-center py-3" style="background-color: #d63384;">
                        <h3 class="mb-0 fw-bold"><i class="bi bi-calendar-check"></i> Reservar Turno</h3>
                        <p class="mb-0 small">Completa el formulario para agendar tu cita</p>
                    </div>
                    <div class="card-body p-4">

                        {{-- Mostrar errores generales o de validación --}}
                        @if(session('error'))
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                <i class="bi bi-check-circle"></i> {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('web.reservar.store') }}" method="POST">
                            @csrf

                            <h5 class="text-secondary border-bottom pb-2 mb-3">1. Detalles del Servicio</h5>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Servicio</label>
                                    <select name="servicio_id" class="form-select @error('servicio_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Selecciona un servicio...</option>
                                        {{-- Aquí recorremos los servicios que enviaste desde el Controlador --}}
                                        @foreach($servicios as $servicio)
                                            <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }}>
                                                {{ $servicio->nombre }} - ${{ number_format($servicio->precio, 0, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('servicio_id') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Fecha</label>
                                    <input type="date" name="fecha" 
                                           class="form-control @error('fecha') is-invalid @enderror" 
                                           value="{{ old('fecha') }}" min="{{ date('Y-m-d') }}" required>
                                    @error('fecha') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-bold">Hora</label>
                                    <select name="hora" class="form-select @error('hora') is-invalid @enderror" required>
                                        <option value="" disabled selected>Elegir...</option>
                                        @for($i = 9; $i <= 18; $i++)
                                            @php 
                                                $hora = str_pad($i, 2, '0', STR_PAD_LEFT) . ':00'; 
                                            @endphp
                                            <option value="{{ $hora }}" {{ old('hora') == $hora ? 'selected' : '' }}>
                                                {{ $hora }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('hora') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <h5 class="text-secondary border-bottom pb-2 mb-3 mt-4">2. Datos de la Mascota</h5>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nombre de la Mascota</label>
                                    <input type="text" name="mascota_nombre" class="form-control" value="{{ old('mascota_nombre') }}" placeholder="Ej: Firulais" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tipo</label>
                                    <select name="mascota_tipo" class="form-select">
                                        <option value="Perro">Perro</option>
                                        <option value="Gato">Gato</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>

                            <h5 class="text-secondary border-bottom pb-2 mb-3 mt-4">3. Tus Datos de Contacto</h5>

                            <div class="mb-3">
                                <label class="form-label">Nombre Completo</label>
                                <input type="text" name="cliente_nombre" class="form-control" value="{{ old('cliente_nombre') }}" required>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="cliente_email" class="form-control" value="{{ old('cliente_email') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Teléfono / WhatsApp</label>
                                    <input type="text" name="cliente_telefono" class="form-control" value="{{ old('cliente_telefono') }}" placeholder="Para confirmación" required>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary py-2 fw-bold" style="background-color: #d63384; border-color: #d63384;">
                                    Confirmar Reserva <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts de Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>