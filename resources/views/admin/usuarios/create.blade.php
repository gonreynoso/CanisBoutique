@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Crear usuario</h1>
    <hr class="mb-2">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body border-0">
                    <form action="{{ route('admin.usuarios.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="role" class="form-label">Roles (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi-person-badge-fill"></i></span>
                                        <select name="role" class="form-control" id="role" required>
                                            <option value="">Seleccionar un rol</option>
                                            @foreach ($roles as $role)
                                                @if (!($role->name == 'SUPER ADMIN'))
                                                    <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Nombre --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nombre del usuario (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi-person-badge-fill"></i></span>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Nombre del usuario" value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Correo electrónico (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi-envelope-fill"></i></span>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Correo electrónico" value="{{ old('email') }}" required>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Contraseña --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Contraseña (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi-lock-fill"></i></span>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Contraseña" required>

                                        {{-- BOTÓN DEL OJO --}}
                                        <button class="btn btn-outline-secondary toggle-password" type="button"
                                            data-target="password">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Confirmar Contraseña --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmar contraseña (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi-lock-fill"></i></span>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation" placeholder="Confirmar contraseña" required>

                                        {{-- BOTÓN DEL OJO --}}
                                        <button class="btn btn-outline-secondary toggle-password" type="button"
                                            data-target="password_confirmation">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Crear usuario</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script local para esta vista --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButtons = document.querySelectorAll('.toggle-password');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    }
                });
            });
        });
    </script>
@endsection