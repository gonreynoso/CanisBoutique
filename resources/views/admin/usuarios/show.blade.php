@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Datos registrados del usuario: {{ $user->name }}</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body border-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                <label class="form-label" for="role">Rol</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi-person-badge-fill"></i></span>
                                    <input type="text" name="role" class="form-control" id="role" placeholder="Rol"
                                        value="{{ $user->roles->pluck('name')->implode(', ') }}" readonly>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre"
                                        value="{{ $user->name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                            value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone_number">Número de teléfono</label>
                                    <input type="text" name="phone_number" class="form-control" id="phone_number"
                                        placeholder="Número de teléfono" value="{{ $user->phone_number }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="created_at">Fecha y hora de creación</label>
                                    <input type="text" name="created_at" class="form-control" id="created_at"
                                        placeholder="Fecha y hora de creación" value="{{ $user->created_at }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-primary"
                                style="float: right;">Volver</a>
                        </div>


                    </div>
                </div>
            </div>
@endsection