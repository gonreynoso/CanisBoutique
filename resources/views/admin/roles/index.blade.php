@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Roles</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Roles registrados <a href="{{ route('admin.roles.create') }}" class="btn btn-primary"
                            style="float: right;"><i class="bi bi-plus-circle"></i>
                            Nuevo rol</a></h5>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre del rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary">Editar</a>
                                        <form action="" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('¿Estas seguro de eliminar este rol?')">Eliminar</button>
                                        </form>
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
@endsection
