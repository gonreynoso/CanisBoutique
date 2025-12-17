@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Roles</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5>Roles registrados <a href="{{ route('admin.roles.create') }}" class="btn btn-primary"
                            style="float: right;"><i class="bi bi-plus-circle"></i>
                            Nuevo rol</a></h5>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre del rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($roles->currentPage() - 1) * $roles->perPage() + 1;
                            @endphp
                            @foreach ($roles as $role)
                                <tr>
                                    <td style="text-align: center;">{{ $nro++ }}</td>
                                    <td style="text-align: center;">{{ $role->name }}</td>
                                    <td style="text-align: center;">

                                        <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>


                                        @if(strtolower($role->name) !== 'super admin' && strtolower($role->name) !== 'admin')


                                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-success">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                                style="display: inline-block;" id="delete-form-{{ $role->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmarBorradoRol('{{ $role->id }}')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @else

                                            <button class="btn btn-secondary" disabled title="Rol del sistema">
                                                <i class="bi bi-shield-lock"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($roles->hasPages())
                        <div class="mt-4 d-flex justify-content-between align-items-center px-3">
                            <div class="text-muted">
                                Mostrando {{ $roles->firstItem() }} - {{ $roles->lastItem() }} de {{ $roles->total() }}
                                roles
                            </div>
                            <div>
                                {{ $roles->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <script>
        function confirmarBorradoRol(id) {
            Swal.fire({
                title: '¿Eliminar Rol?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection