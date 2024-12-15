<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GamerFest</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-black">
     <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="{{url('/')}}">GamerFest</a>
      <!-- Toggle Button for Mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <!-- Menú centrado -->
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
            <a class="nav-link" href="#">Austiciantes</a>
          </li>
        </ul>
        <!-- Botón Login alineado a la derecha -->
        <a class="btn-login" href="{{url('/admin/login')}}">Login</a>
      </div>
    </div>
  </nav>

    <!-- Descripción -->
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Description Column -->
            <div class="col-md-6 mb-4">
                    <!-- Location -->
                <div class="mb-3">
                    <p class="event-location">ESPE - SEDE LATACUNGA</p>
                </div>

                <!-- Title -->
                <div class="mb-4">
                    <p class="event-title">Gamer Fest<br>2025</p>
                </div>

                <!-- Description -->
                <div class="mb-5">
                    <p class="event-description">
                        ¡Ven y disfruta con nosotros estos 3 días del<br>
                        evento Gamer más grande y divertido del<br>
                        centro del País!
                    </p>
                </div>
                <!-- Register Button -->
                <a href="#" class="btn-register">Inscríbete ya</a>
                
            </div>
                <!-- Image Column -->
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="height: 100%;">
                <div class="fest-2-69834563de28"></div>
            </div>
        </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
