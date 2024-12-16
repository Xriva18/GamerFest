<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GamerFest</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
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
            <a class="navbar-brand" href="{{ url('/') }}">GamerFest</a>
            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <!-- Menú centrado -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Juegos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#juegos-individuales">Individuales</a></li>
                            <li><a class="dropdown-item" href="#juegos-grupales">Grupales</a></li>
                        </ul>

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
                <a class="btn-login" href="{{ url('/admin/login') }}">Login</a>
            </div>
        </div>
    </nav>

    <!-- Descripción -->
    <div class="container">
        <div class="row align-items-center mt-3">
            <!-- Description Column -->
            <div class="col-md-5 mb-4 text-center text-md-start">
                <!-- Location -->
                <div class="event-container">
                    <p class="event-location">ESPE - SEDE LATACUNGA</p>
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
                <div class="d-flex justify-content-center justify-content-md-start">
                    <a href="#" class="btn-register">Inscríbete ya!</a>
                </div>
            </div>
            <!-- Image Column -->
            <div class="col-md-7 d-flex justify-content-center">
                <img src="{{ asset('img/logo-fest.png') }}" alt="Logo Gamer Fest"
                    class="mt-2 pt-3 img-fluid h-100 w-100 vhs-effect" style="object-fit: contain;">
            </div>
        </div>
    </div>
    <!-- Juegos indvidules -->
    <div class="container description-container">
        <div class="mt-5 mb-5 event-title2 text-center text-md-start">
            Juegos individules
        </div>
        <div class="row justify-content-center">
            <!-- Juego 1 -->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosIndividuales/mortal.jpg') }}" class="card-img-top" alt="mortal">
                    <div class="card-body">
                        <h5 class="card-title">Mortal Kombat 1</h5>
                        <p class="card-text">5,00 $</p>
                    </div>
                </div>
            </div>
            <!-- Juego 2 -->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosIndividuales/fifa.jpg') }}" class="card-img-top" alt="fifa">
                    <div class="card-body">
                        <h5 class="card-title">FIFA 2025</h5>
                        <p class="card-text">3,50 $</p>
                    </div>
                </div>
            </div>
            <!-- Juego  3-->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosIndividuales/dragon.jpg') }}" class="card-img-top" alt="fifa">
                    <div class="card-body">
                        <h5 class="card-title">Dragon Ball Z BT3</h5>
                        <p class="card-text">4,00 $</p>
                    </div>
                </div>
            </div>
            <!-- Juego  4-->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosIndividuales/dance.jpg') }}" class="card-img-top" alt="Just Dance">
                    <div class="card-body">
                        <h5 class="card-title">Just Dance</h5>
                        <p class="card-text">3,00 $</p>
                    </div>
                </div>
            </div>
            <!-- Juego 5-->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosIndividuales/mario.jpg') }}" class="card-img-top"
                        alt="Mario Kart 8 Deluxe">
                    <div class="card-body">
                        <h5 class="card-title">Mario Kart 8 Deluxe</h5>
                        <p class="card-text">4,50 $</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Juegos Grupales -->
    <div class="container description-container">
        <div class="mt-1 mb-5 event-title2 text-center text-md-start">
            Juegos Grupales
        </div>
        <div class="row justify-content-center">
            <!-- Juego 1 -->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosGrupales/dota2.jpg') }}" class="card-img-top" alt="Dota 2">
                    <div class="card-body">
                        <h5 class="card-title">Dota 2</h5>
                        <p class="card-text">5,00 $</p>
                    </div>
                </div>
            </div>
            <!-- Juego 2 -->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosGrupales/league.jpg') }}" class="card-img-top"
                        alt="League of Legends">
                    <div class="card-body">
                        <h5 class="card-title">League of Legends</h5>
                        <p class="card-text">4,50 $</p>
                    </div>
                </div>
            </div>
            <!-- Juego 3 -->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosGrupales/fornite.jpg') }}" class="card-img-top" alt="Fornite">
                    <div class="card-body">
                        <h5 class="card-title">Fornite</h5>
                        <p class="card-text">3,50 $</p>
                    </div>
                </div>
            </div>
            <!-- Juego 4 -->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosGrupales/valorant.jpg') }}" class="card-img-top" alt="Valorant">
                    <div class="card-body">
                        <h5 class="card-title">Valorant</h5>
                        <p class="card-text">4,00 $</p>
                    </div>
                </div>
            </div>
            <!-- Juego 5 -->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosGrupales/clash.jpg') }}" class="card-img-top" alt="Clash Royale">
                    <div class="card-body">
                        <h5 class="card-title">Clash Royale</h5>
                        <p class="card-text">2,50 $</p>
                    </div>
                </div>
            </div>
            <!-- Juego 6 -->
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card custom-card">
                    <img src="{{ asset('img/JuegosGrupales/free.jpg') }}" class="card-img-top" alt="Free Fire">
                    <div class="card-body">
                        <h5 class="card-title">Free Fire</h5>
                        <p class="card-text">3,00 $</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Horairos -->
    <div class="container description-container">
        <div class="mt-1 mb-4 event-title2 text-center text-md-start">
            Horarios
        </div>

        <table class="m-3">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Actividad</th>
                    <th>Lugar</th>
                    <th>Responsable</th>
                </tr>
            </thead>
            <tbody>
                <!-- DIA 1 - 21/06/2025-->
                <tr>
                    <td rowspan="4"class="border-light">21/06/2025</td>
                    <td rowspan="4"class="border-light">17:00-22:00</td>
                    <td>Desarrollo del Torneo Dota 2</td>
                    <td rowspan="4" class="border-light">VIRTUAL</td>
                    <td>Kenneth Toapanta</td>
                </tr>
                <tr>
                    <td>Desarrollo del Torneo League of Legends</td>
                    <td>Alexander Quiñonez</td>
                </tr>
                <tr>
                    <td>Desarrollo del Torneo Fornite</td>
                    <td>Brandon Sangoluisa</td>
                </tr>
                <tr>
                    <td class="border-light">Desarrollo del Torneo Valorant</td>
                    <td class="border-light">Joselyn García</td>
                </tr>

                <!-- DIA 2 - 22/06/2025-->
                <tr>
                    <td rowspan="18" class="border-light">22/06/2025</td>
                    <td>8:00-8:30</td>
                    <td>Inauguración Gamer Fest 2025</td>
                    <td>Planta Baja (Pileta)</td>
                    <td>Ing. Gonzalo Borja, Andrea Lascano</td>
                </tr>

                <!-- Bloque 9:00-14:00 (12 actividades) -->
                <tr>
                    <td rowspan="12">9:00-14:00</td>
                    <td>Exposición Evolución de Videojuegos / Línea de tiempo, Juegos desarrollados</td>
                    <td rowspan="2">Planta Baja (Pileta)</td>
                    <td>Ing. Marcelo Álvarez</td>
                </tr>
                <tr>
                    <td>Concurso de Desarrollo de Videojuegos</td>
                    <td>Ing. Marcelo Álvarez, Anshela Castillo</td>
                </tr>
                <tr>
                    <td>Desarrollo del torneo Just Dance</td>
                    <td>A-410</td>
                    <td>Ivan Solís</td>
                </tr>
                <tr>
                    <td>Desarrollo del torneo Clash Royale</td>
                    <td>A-409</td>
                    <td>Eduardo Carrera</td>
                </tr>
                <tr>
                    <td>Desarrollo del torneo Dragon Ball Z Budokai Tenkaichi 3</td>
                    <td>A-408</td>
                    <td>Jorge Armas</td>
                </tr>
                <tr>
                    <td>Desarrollo del torneo Super Smash Bros</td>
                    <td>A-403</td>
                    <td>Kevin Armas</td>
                </tr>
                <tr>
                    <td>Desarrollo del torneo Free Fire</td>
                    <td>A-407</td>
                    <td>Dennis Caisa</td>
                </tr>
                <tr>
                    <td>Desarrollo del torneo FIFA 2022</td>
                    <td>A-406</td>
                    <td>William Jacome</td>
                </tr>
                <tr>
                    <td>Desarrollo del Torneo Mario Kart</td>
                    <td>A-405</td>
                    <td>Mateo Enríquez</td>
                </tr>
                <tr>
                    <td>Desarrollo del Torneo Counter Strike (Casual)</td>
                    <td>Laboratorio de Ingeniería de Software</td>
                    <td>Joan Velazco</td>
                </tr>
                <tr>
                    <td>Desarrollo del Torneo Mortal Kombat (Casual)</td>
                    <td rowspan="2">Aula-403</td>
                    <td>Jordan Talahua</td>
                </tr>
                <tr>
                    <td>Desarrollo del Torneo Rocket League (Casual)</td>
                    <td>Elías Tellería</td>
                </tr>

                <tr>
                    <td>13:00-13:30</td>
                    <td>Presentación de grupo Folklórico "Likanantay"</td>
                    <td>Planta Baja (Pileta)</td>
                    <td>Ing. Fabian Montaluisa</td>
                </tr>

                <!-- Bloque 17:00-22:00 (4 actividades) -->
                <tr>
                    <td rowspan="4" class="border-light">17:00-22:00</td>
                    <td>Desarrollo de Semi-Finales y Finales del Torneo Dota 2</td>
                    <td rowspan="4" class="border-light">VIRTUAL</td>
                    <td>Kenneth Toapanta</td>
                </tr>
                <tr>
                    <td>Desarrollo de Semi-Finales y Finales del League of Legends</td>
                    <td>Alexander Quiñonez</td>
                </tr>
                <tr>
                    <td>Desarrollo de Semi-Finales y Finales del Torneo Fornite</td>
                    <td>Brandon Sangoluisa</td>
                </tr>
                <tr>
                    <td class="border-light">Desarrollo de Semi-Finales y Finales del Torneo Valorant</td>
                    <td class="border-light">Joselyn García</td>
                </tr>

                <!-- DIA 3 - 23/06/2025(9 actividades) -->
                <tr>
                    <td rowspan="9">23/06/2025</td>
                    <!-- Bloque 9:00-11:00 (8 filas, la última del bloque es diferente) -->
                    <td rowspan="8">9:00-11:00</td>
                    <td>Desarrollo de Finales del torneo Just Dance</td>
                    <td>A-401</td>
                    <td>Ivan Solís</td>
                </tr>
                <tr>
                    <td>Desarrollo de Finales del Clash Royale</td>
                    <td>A-402</td>
                    <td>Eduardo Carrera</td>
                </tr>
                <tr>
                    <td>Desarrollo de Finales del torneo Dragon Ball Z Budokai Tenkaichi 3</td>
                    <td>A-404</td>
                    <td>Jorge Armas</td>
                </tr>
                <tr>
                    <td>Desarrollo de Finales del torneo Super Smash Bros</td>
                    <td>A-405</td>
                    <td>Kevin Armas</td>
                </tr>
                <tr>
                    <td>Desarrollo de Finales del torneo Free Fire</td>
                    <td>A-403</td>
                    <td>Dennis Caisa</td>
                </tr>
                <tr>
                    <td>Desarrollo de Finales del torneo FIFA 2022</td>
                    <td>A-406</td>
                    <td>William Jácome</td>
                </tr>
                <tr>
                    <td>Desarrollo de Finales del Torneo Mario Kart</td>
                    <td>A-407</td>
                    <td>Mateo Enríquez</td>
                </tr>
                <tr>
                    <td>Desarrollo de Concurso de Cosplay</td>
                    <td>Planta Baja (Campus Guillermo Rodriguez Lara), Segundo Piso (Departamento de Software)</td>
                    <td>Ing. Gonzalo Borja</td>
                </tr>
                <tr>
                    <td>11:30-13:00</td>
                    <td>Premiación y Clausura Gamer Fest 2025</td>
                    <td>Auditorio A</td>
                    <td>Ing. Gonzalo Borja</td>
                </tr>
            </tbody>
        </table>
    </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
