@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Usuarios</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5>Usuarios registrados <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary"
                            style="float: right;"><i class="bi bi-plus-circle"></i>
                            Nuevo usuario</a></h5>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre del usuario</th>
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
                                    <td style="text-align: center;">{{ $user->name }}</td>
                                    <td style="text-align: center;">
                                        {{--
                                        <a href="{{ route('admin.usuarios.show', $user->id) }}" class="btn btn-info"><i
                                                class="bi bi-eye"></i></a> --}}


                                        <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn btn-success"><i
                                                class="bi bi-pencil"></i></a>


                                        <form action="{{ url('admin/usuarios', $user->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('¿Estas seguro de eliminar este usuario?')"><i
                                                    class="bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($users->hasPages())
                        <div class="mt-4 d-flex justify-content-between align-items-center px-3">
                            <div class="text-muted">
                                Mostrando {{ $users->firstItem() }} - {{ $users->lastItem() }} de {{ $users->total() }}
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
@endsection