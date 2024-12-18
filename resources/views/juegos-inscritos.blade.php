<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos Inscritos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: #00ffff;
        }
        .container {
            margin-top: 30px;
        }
        .table-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .status-box {
            background-color: #00ffff;
            width: 20px;
            height: 20px;
            margin: auto;
        }
        .table-fro{
            background-color: #00ffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Juegos Inscritos</h1>

        <!-- Juegos Individuales -->
        <div class="mb-5">
            <div class="table-title">Juegos individuales inscritos</div>
            <table class="table table-bordered text-white">
                <thead>
                    <tr>
                        <th>Juego</th>
                        <th>Jugador</th>
                        <th>Estado de inscripción</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($individualGames as $game)
                        <tr>
                            <td>{{ $game->game }}</td>
                            <td>{{ $game->name }}</td>
                            <td>{{ $game->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No hay inscripciones individuales.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Juegos en Equipo -->
        <div>
            <div class="table-title">Juegos en equipo inscritos</div>
            <table class="table table-bordered text-white">
                <thead>
                    <tr>
                        <th>Juego</th>
                        <th>Equipo</th>
                        <th>Estado de inscripción</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groupGames as $game)
                        <tr>
                            <td>{{ $game->game }}</td>
                            <td>{{ $game->team_name }}</td>
                            <td>{{ $game->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No hay inscripciones grupales.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
