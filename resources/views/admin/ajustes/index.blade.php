@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Ajustes del sistema</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Configuraciones del sistema</h5>
                </div>
                <form action="{{ route('admin.ajustes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre <sup
                                                class="text-danger">(*)</sup></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-book"></i></span>
                                            <input type="text" name="nombre" class="form-control"
                                                @error('nombre') class="is-invalid" @enderror
                                                placeholder="Nombre del sistema" value="" required>
                                            @error('nombre')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="descripcion" class="form-label">Descripción <sup
                                                class="text-danger">(*)</sup></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                                            <input type="text" name="descripcion" class="form-control"
                                                @error('descripcion') class="is-invalid" @enderror
                                                placeholder="Descripción del sistema" value="" required>
                                            @error('descripcion')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sucursal" class="form-label">Sucursal <sup
                                                class="text-danger">(*)</sup></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                                            <input type="text" name="sucursal" class="form-control"
                                                @error('sucursal') class="is-invalid" @enderror
                                                placeholder="Nombre de la sucursal" value="" required>
                                            @error('sucursal')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="direccion" class="form-label">Dirección <sup
                                                class="text-danger">(*)</sup></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
                                            <input type="text" name="direccion" class="form-control"
                                                @error('direccion') class="is-invalid" @enderror
                                                placeholder="Dirección de la sucursal" value="" required>
                                            @error('direccion')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="telefono" class="form-label">Teléfono <sup
                                                class="text-danger">(*)</sup></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                            <input type="text" name="telefono" class="form-control"
                                                @error('telefono') class="is-invalid" @enderror
                                                placeholder="Teléfono de la sucursal" value="" required>
                                            @error('telefono')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="email" class="form-label">Email <sup
                                                class="text-danger">(*)</sup></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input type="text" name="email" class="form-control"
                                                @error('email') class="is-invalid" @enderror
                                                placeholder="Email de la sucursal" value="" required>
                                            @error('email')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="moneda" class="form-label">Moneda <sup
                                                class="text-danger">(*)</sup></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                            <select name="moneda" id="" class="form-control">
                                                <option value="">Seleccione una moneda</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item['symbol'] }}">
                                                        {{ $item['name'] }}({{ $item['symbol'] }})</option>
                                                @endforeach
                                            </select>
                                            @error('moneda')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pagina_web" class="form-label">Página Web <sup
                                                class="text-danger">(*)</sup></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-globe"></i></span>
                                            <input type="text" name="pagina_web" class="form-control"
                                                @error('pagina_web') class="is-invalid" @enderror
                                                placeholder="Pagina web de la sucursal" value="" required>
                                            @error('pagina_web')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-2 mt-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
