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
        <div class="card-body">
          <form action="">
            <div class="row">
              <div class="col-md-10">
                <div class="row">
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre <sup class="text-danger">(*)</sup></label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-building"></i></span>
                      <input type="text" name="nombre" class="form-control" @error('nombre') class="is-invalid" @enderror
                        placeholder="Nombre del sistema" value="" required>
                      @error('nombre')
                        <div class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="descripcion" class="form-label">Descripción <sup class="text-danger">(*)</sup></label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
                      <input type="text" name="descripcion" class="form-control" @error('descripcion') class="is-invalid" @enderror
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
                    <label for="nombre" class="form-label">Nombre <sup class="text-danger">(*)</sup></label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-building"></i></span>
                      <input type="text" name="nombre" class="form-control" @error('nombre') class="is-invalid" @enderror
                        placeholder="Nombre del sistema" value="" required>
                      @error('nombre')
                        <div class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="descripcion" class="form-label">Descripción <sup class="text-danger">(*)</sup></label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
                      <input type="text" name="descripcion" class="form-control" @error('descripcion') class="is-invalid" @enderror
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
          </form>
        </div>

      </div>
    </div>
  </div>


@endsection