@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="form-container col-md-10">
        <h2 class="text-center mb-4">Inscripción en Grupo</h2>
        <form action="{{ route('group.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Nombre del Equipo y Juegos -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="team_name" class="form-label">Nombre del Equipo*</label>
                    <input type="text" id="team_name" name="team_name" class="form-control" placeholder="Nombre del equipo" required>
                </div>
                <div class="col-md-6">
                    <label for="game" class="form-label">Juegos*</label>
                    <select id="game" name="game" class="form-select" required>
                        <option selected disabled>Seleccione</option>
                        <option value="Dota 2">Dota 2</option>
                        <option value="Valorant">Valorant</option>
                    </select>
                </div>
            </div>

            <!-- Nombre del Capitán -->
            <div class="mb-3">
                <label for="captain_name" class="form-label">Nombre del Capitán*</label>
                <input type="text" id="captain_name" name="captain_name" class="form-control" placeholder="Nombre del capitán" required>
            </div>

            <!-- Nombres de los Miembros -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="member1" class="form-label">Miembro 1*</label>
                    <input type="text" id="member1" name="members[]" class="form-control" placeholder="Nombre del miembro 1" required>
                </div>
                <div class="col-md-6">
                    <label for="member2" class="form-label">Miembro 2*</label>
                    <input type="text" id="member2" name="members[]" class="form-control" placeholder="Nombre del miembro 2" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="member3" class="form-label">Miembro 3*</label>
                    <input type="text" id="member3" name="members[]" class="form-control" placeholder="Nombre del miembro 3" required>
                </div>
                <div class="col-md-6">
                    <label for="member4" class="form-label">Miembro 4*</label>
                    <input type="text" id="member4" name="members[]" class="form-control" placeholder="Nombre del miembro 4" required>
                </div>
            </div>

            <!-- Archivo -->
            <div class="mb-4">
                <label for="image" class="form-label">Comprobante de Depósito*</label>
                <div class="text-center border p-4 rounded">
                    <input type="file" id="image" name="image" class="form-control" style="border: none;" required>
                    <p class="mt-2">subir archivo</p>
                </div>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-center gap-4">
                <button type="submit" class="btn btn-custom">Inscribirse</button>
                <button type="reset" class="btn btn-custom">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection
