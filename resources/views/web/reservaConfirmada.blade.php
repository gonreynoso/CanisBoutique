<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Confirmada - CanisBoutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .btn-brand {
            background-color: #d63384;
            border-color: #d63384;
            color: white;
        }

        .btn-brand:hover {
            background-color: #c02a74;
            border-color: #c02a74;
            color: white;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container">
        <div class="card shadow-lg border-0 text-center p-4 p-md-5 mx-auto"
            style="max-width: 600px; border-radius: 20px;">
            <div class="card-body">


                <div class="mb-4">
                    <div
                        style="width: 80px; height: 80px; background-color: #d63384; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;">
                        <i class="bi bi-check-lg text-white" style="font-size: 3rem;"></i>
                    </div>
                </div>

                <h2 class="fw-bold mb-3 text-dark">¡Reserva Exitosa!</h2>

                @if (session('turnoReciente'))
                    @php $turno = session('turnoReciente'); @endphp

                    <div class="alert alert-light border text-start mt-4 rounded-3">
                        <h5 class="fw-bold text-secondary mb-3 fs-6 text-uppercase">
                            <i class="bi bi-receipt me-1"></i> Resumen de la cita:
                        </h5>
                        <ul class="list-unstyled mb-0 small text-muted">
                            <li class="mb-2">
                                <strong class="text-dark">🐶 Peludo:</strong> {{ $turno->mascota_nombre }}
                            </li>
                            <li class="mb-2">
                                <strong class="text-dark">📅 Fecha:</strong>
                                {{ \Carbon\Carbon::parse($turno->fecha)->format('d/m/Y') }}
                            </li>
                            <li class="mb-2">
                                <strong class="text-dark">⏰ Hora:</strong> {{ $turno->hora }} hs
                            </li>
                            <li class="mb-0">
                                <strong class="text-dark">👤 Cliente:</strong> {{ $turno->cliente_nombre }}
                            </li>
                        </ul>
                    </div>


                    <div class="mt-4">
                        <a href="{{ $turno->google_calendar_link }}" target="_blank"
                            class="btn btn-outline-dark fw-bold w-100 py-2 border-2">
                            <i class="bi bi-google me-2"></i> Agendar en Google Calendar
                        </a>
                    </div>
                @else

                    <p class="text-muted mb-4">
                        {{ session('success') ?? 'Tu turno ha sido agendado correctamente.' }}
                    </p>
                    <div class="alert alert-info border-0 bg-opacity-10" role="alert">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        Te enviamos un correo con los detalles.
                    </div>
                @endif

                <div class="d-grid gap-2 mt-5">
                    <a href="{{ route('web.index') }}" class="btn btn-brand py-2 fw-bold">
                        Volver al Inicio
                    </a>
                    <a href="{{ route('web.reservar') }}" class="btn btn-link text-secondary text-decoration-none">
                        Hacer otra reserva
                    </a>
                </div>

            </div>
        </div>
    </div>

</body>

</html>