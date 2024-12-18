<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción Individual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d0202; /* Color de fondo oscuro */
        }
        .form-container {
            background-color: #321c1c; /* Color de fondo del formulario */
            padding: 30px;
            border-radius: 10px;
            color: #00ffff; /* Color del texto */
        }
        .form-control, .form-select {
            border: 1px solid #00ffff;
            background-color: transparent;
            color: #00ffff;
        }
        .form-control::placeholder {
            color: #00ffff;
        }
        .form-label {
            color: #00ffff;
        }
        .btn-custom {
            background-color: #00ffff;
            color: #000;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #00cccc;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        @yield('content') <!-- Donde se incluirá el contenido -->
    </div>
</body>
</html>
