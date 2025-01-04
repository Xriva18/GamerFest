<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
</head>

<body>
    <h1>Subir un Archivo</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @elseif(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('fileupload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Selecciona una imagen:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Subir</button>
    </form>
</body>

</html>
