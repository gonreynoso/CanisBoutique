@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Crear Rol</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>Llenar los campos</h5>
                </div> --}}
                <div class="card-body border-0">
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre del rol (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi-person-badge-fill"></i></span>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Nombre del rol" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
