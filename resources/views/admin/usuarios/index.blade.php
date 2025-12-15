@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Usuarios</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('admin.usuarios.index') }}" method="GET">
                                <div class="input-group mb-3 mt-3 gap-2 col-md-6">
                                    <input type="text" name="search" class="form-control" placeholder="Buscar..."
                                        value="{{ $_REQUEST['search'] ?? '' }}">
                                    <button class="btn btn-outline-primary" type="submit"><i
                                            class="bi bi-search"></i></button>
                                    @if (isset($_REQUEST['search']))
                                        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-secondary">Borrar
                                            búsqueda<i class="bi bi"></i></a>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 text-end mt-3">
                            <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary"><i
                                    class="bi bi-plus-circle"></i>
                                Nuevo usuario</a>
                        </div>
                    </div>

                    <table class=" table table-bordered table-striped table-hover mt-2 text-center">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Rol de usuario</th>
                                <th>Nombre del usuario</th>
                                <th>Correo electrónico</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($users->currentPage() - 1) * $users->perPage() + 1;
                            @endphp
                            @foreach ($users as $user)

                                <tr>
                                    <td style="text-align: center;">{{ $nro++ }}</td>
                                    <td style="text-align: center;">{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                    <td style="text-align: center;">{{ $user->name }}</td>
                                    <td style="text-align: center;">{{ $user->email }}</td>
                                    <td style="text-align: center;">
                                        @if ($user->estado == 0)
                                            <span class="badge bg-danger">Inactivo</span>
                                        @else
                                            <span class="badge bg-success">Activo </span>
                                        @endif
                                    </td>

                                    <td class="text-center" style="text-align: center;">
                                        @if($user->estado == 1)
                                            <a href="{{ route('admin.usuarios.show', $user->id) }}" class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>


                                            <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>


                                            <form action="{{ route('admin.usuarios.destroy', $user->id) }}" method="POST"
                                                id="form-eliminar-{{ $user->id }}" style="display: inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmarEliminacion({{ $user->id }}, '{{ $user->name }}')">
                                                    <i class="bi bi-trash"></i> Deshabilitar
                                                </button>

                                            </form>
                                        @else
                                            {{-- 1. Cambiamos el ID a 'form-habilitar-' --}}
                                            <form action="{{ route('admin.usuarios.restore', $user->id) }}" method="POST"
                                                id="form-habilitar-{{ $user->id }}" style="display: inline-block;">

                                                @csrf
                                                @method('PATCH') {{-- 2. Agregamos el método PATCH o PUT --}}

                                                {{-- 3. Cambiamos type="submit" por type="button" --}}
                                                <button type="button" class="btn btn-success"
                                                    onclick="confirmarHabilitar({{ $user->id }}, '{{ $user->name }}')">
                                                    <i class="bi bi-arrow-clockwise"></i> Habilitar
                                                </button>
                                            </form>
                                        @endif

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($users->hasPages())
                        <div class="mt-4 d-flex justify-content-between align-items-center px-3">
                            <div class="text-muted">
                                Mostrando {{ $users->firstItem() }} - {{ $users->lastItem() }} de
                                {{ $users->total() }}
                                usuarios
                            </div>
                            <div>
                                {{ $users->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script>
        // Esta función recibe el ID específico que le pasamos desde el botón
        function confirmarEliminacion(idUsuario, nombreUsuario) {

            Swal.fire({
                title: '¿Desea deshabilitar a ' + nombreUsuario + '?',
                text: "El usuario ya no tendrá acceso al panel ni a la web.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d63384',
                cancelButtonColor: '#333',
                confirmButtonText: 'Sí, deshabilitar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    var formulario = document.getElementById('form-eliminar-' + idUsuario);

                    if (formulario) {
                        formulario.submit();
                    } else {
                        console.error('No se encontró el formulario para el ID: ' + idUsuario);
                    }
                }
            })
        }

        function confirmarHabilitar(idUsuario, nombreUsuario) {

            Swal.fire({
                title: '¿Desea habilitar a ' + nombreUsuario + '?',
                text: "El usuario podrá acceder al panel y a la web.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d63384',
                cancelButtonColor: '#333',
                confirmButtonText: 'Sí, habilitar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    // CORRECCIÓN: Apuntamos al ID 'form-habilitar-'
                    var formulario = document.getElementById('form-habilitar-' + idUsuario);

                    if (formulario) {
                        formulario.submit();
                    } else {
                        // Mensaje de error más descriptivo
                        console.error('No se encontró el formulario para habilitar el ID: ' + idUsuario);
                    }
                }
            })
        }
    </script>



@endsection