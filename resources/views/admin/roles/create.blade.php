@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Crear Rol</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Llenar los campos</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->description }}</td>
                                                <td>
                                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                        class="btn btn-primary">Editar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
