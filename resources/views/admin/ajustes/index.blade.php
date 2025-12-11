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
                                                placeholder="Nombre de la empresa"
                                                value="{{ old('nombre', $ajuste->nombre ?? '') }}" required>
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
                                                placeholder="Descripción del sistema"
                                                value="{{ old('descripcion', $ajuste->descripcion ?? '') }}" required>
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
                                                placeholder="Nombre de la sucursal"
                                                value="{{ old('sucursal', $ajuste->sucursal ?? '') }}" required>
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
                                                placeholder="Dirección de la sucursal"
                                                value="{{ old('direccion', $ajuste->direccion ?? '') }}" required>
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
                                                placeholder="Teléfono de la sucursal"
                                                value="{{ old('telefono', $ajuste->telefono ?? '') }}" required>
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
                                                placeholder="Email de la sucursal"
                                                value="{{ old('email', $ajuste->email ?? '') }}" required>
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
                                        <label for="divisa" class="form-label">Moneda <sup
                                                class="text-danger">(*)</sup></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                            <select name="divisa" id="" class="form-control">
                                                <option value="">Seleccione una moneda</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item['symbol'] }}"
                                                        {{ old('divisa', $ajuste->divisa) ?? $item['symbol'] ? 'selected' : '' }}>
                                                        {{ $item['name'] }}({{ $item['symbol'] }})</option>
                                                @endforeach
                                            </select>
                                            @error('divisa')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pagina_web" class="form-label">Página Web (Opcional)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-globe"></i></span>
                                            <input type="text" name="pagina_web" class="form-control"
                                                @error('pagina_web') class="is-invalid" @enderror
                                                placeholder="Pagina web de la sucursal"
                                                value="{{ old('pagina_web', $ajuste->pagina_web ?? '') }}">
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

                    <div class="col-md-2 m-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
