@extends('layouts.admin') {{-- Asumo que este es tu layout principal del panel --}}

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Calendario de Turnos</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                {{-- Aquí se dibujará el calendario --}}
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS NECESARIOS --}}
    {{-- 1. FullCalendar JS (CDN) --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

    {{-- 2. SweetAlert2 (Para mostrar detalles bonitos al hacer clic) --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listWeek'
                },
                // La fuente de datos es tu ruta JSON
                events: "{{ route('admin.turnos.datos') }}",

                // Qué pasa cuando haces clic en un evento (turno)
                eventClick: function (info) {
                    var evento = info.event;
                    var props = evento.extendedProps;

                    Swal.fire({
                        title: evento.title,
                        html: `
                                    <div class="text-start">
                                        <p><strong>Cliente:</strong> ${props.cliente}</p>
                                        <p><strong>Teléfono:</strong> ${props.telefono}</p>
                                        <p><strong>Hora:</strong> ${evento.start.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</p>
                                    </div>
                                `,
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Cerrar',
                        cancelButtonText: 'Eliminar Turno',
                        cancelButtonColor: '#dc3545',
                        confirmButtonColor: '#6c757d',
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: "El horario quedará libre nuevamente.",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#dc3545',
                                confirmButtonText: 'Sí, eliminar',
                                cancelButtonText: 'No'
                            }).then((confirm) => {
                                if (confirm.isConfirmed) {
                                    fetch(`/admin/turnos/${evento.id}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Content-Type': 'application/json'
                                        }
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                evento.remove();
                                                Swal.fire('Eliminado', 'El turno ha sido cancelado.', 'success');
                                            }
                                        })
                                        .catch(error => console.error('Error:', error));
                                }
                            });
                        }
                    });
                } // <--- Aquí termina la función eventClick
            }); // <--- ESTO FALTABA: Cerrar el objeto de configuración y el paréntesis del constructor

            // Ahora sí podemos renderizar
            calendar.render();
        });
    </script>

    <style>
        /* Ajuste para que los eventos se vean mejor */
        .fc-event {
            cursor: pointer;
            font-size: 0.9em;
        }
    </style>
@endsection