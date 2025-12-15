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

                    <table class=" table table-bordered table-striped table-hover mt-2">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Rol de usuario</th>
                                <th>Nombre del usuario</th>
                                <th>Correo</th>
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

                                        <a href="{{ route('admin.usuarios.show', $user->id) }}" class="btn btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>


                                        <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn btn-success">
                                            <i class="bi bi-pencil"></i>
                                        </a>


                                        <form action="{{ route('admin.usuarios.destroy', $user->id) }}" method="POST"
                                            id="form-eliminar-{{ $user->id }}" style="display: inline-block;">

                                            @csrf
                                            @method('DELETE')

                                            {{-- Cambiamos type="submit" por type="button" para que JS controle el envío --}}
                                            <button type="button" class="btn btn-danger"
                                                onclick="confirmarEliminacion({{ $user->id }})">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>

                                        </form>
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
        function confirmarEliminacion(userId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d63384', // Tu color Canis Pink
                cancelButtonColor: '#333',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aquí buscamos el formulario específico por ID y lo enviamos
                    document.getElementById('form-eliminar-' + userId).submit();
                }
            })
        }
    </script>

@endsection