<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CB - Inicio</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased pt-20">

    <x-header />

    <main>
        {{-- Aquí van tus componentes de contenido: --}}
        <x-hero />
        <x-grooming />
        <x-shop />
        <x-testimonials />
        <x-contact />
    </main>

    <x-footer />

</body>

</html>