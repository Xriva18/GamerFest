<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GamerFest</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet">
    </head>
    <body class="bg-dark text-white">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
  <div class="container">
    <a class="navbar-brand fw-bold fs-2" href="#">GamerFest</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGamerFest" aria-controls="navbarGamerFest" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarGamerFest">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
        <li class="nav-item">
          <a class="nav-link" href="#">Juegos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Horarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reglamento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Auspiciantes</a>
        </li>
      </ul>
      <div class="d-flex">
        <a href="#" class="btn btn-login">Login</a>
      </div>
    </div>
  </div>
</nav>
  
  <!-- Bootstrap JS (opcional si se requiere funcionalidad en el navbar) -->
  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
  </script>
</body>
</html>
