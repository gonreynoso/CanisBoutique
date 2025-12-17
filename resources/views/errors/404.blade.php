@extends('layouts.web')

@section('title', 'Página no encontrada - CanisBoutique')

@section('content')

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center py-4">
            <h1 class="mb-2 mb-lg-0">Error 404</h1>
            <nav class="breadcrumbs">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">404</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="error-404" class="error-404 section py-5">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center">

                <div class="error-icon mb-4" style="font-size: 4rem; color: #d63384;">
                    <i class="bi bi-exclamation-circle"></i>
                </div>

                <h1 class="error-code mb-4 fw-bold" style="font-size: 6rem; line-height: 1;">404</h1>

                <h2 class="error-title mb-3 fw-bold">¡Ups! Página no encontrada</h2>

                <p class="error-text mb-4 text-muted mx-auto" style="max-width: 600px;">
                    La página que estás buscando podría haber sido eliminada, cambió de nombre o no está disponible
                    temporalmente.
                </p>

                <div class="search-box mb-4 mx-auto" style="max-width: 500px;">
                    <form action="{{ route('tienda.index') }}" method="GET" class="search-form">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar productos..."
                                aria-label="Search">
                            <button class="btn btn-primary" type="submit"
                                style="background-color: #d63384; border-color: #d63384;">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="error-action mt-5">
                    <a href="{{ route('web.index') }}" class="btn btn-primary rounded-pill px-5 py-3 shadow-sm"
                        style="background-color: #d63384; border-color: #d63384;">
                        <i class="bi bi-arrow-left me-2"></i> Volver al Inicio
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection