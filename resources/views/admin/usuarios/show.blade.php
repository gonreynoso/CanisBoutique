@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Datos registrados del usuario: {{ $user->name }}</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body border-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre del usuario</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi-person-badge-fill"></i></span>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nombre del usuario" value="{{ $user->name }}" readonly>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Fecha y hora de creación</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="bi-calendar3"></i></span>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Fecha y hora de creación" value="{{ $user->created_at }}" readonly>

                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection