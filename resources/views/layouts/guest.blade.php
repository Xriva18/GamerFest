<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/inscripcion.css') }}">

</head>

<body class="bg-black">
    <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center bg-black">
        <div class="row w-100 d-flex flex-column flex-md-row justify-content-center align-items-center m-4"
            style="max-width: 500px;">
            <div class=" text-center">
                <a href="/">
                    <img src="{{ asset('img\logo-fest.svg') }}" alt="Logo"
                        class="mb-3 img-fluid ins-brillo ins-zoom" style="max-height: 100px;">
                </a>
            </div>
            <div class="col-12">
                <div class="card ins-card">
                    <div class="card-body text-center">
                        <div class="shadow-sm rounded">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
