@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="form-container col-md-8">
        <h2 class="text-center mb-4">Inscripción Individual</h2>
        <form action="{{ route('individual.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <!-- Nick Name -->
                <div class="col-md-6">
                    <label for="name" class="form-label">Nick Name*</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre......." required>
                </div>

                <!-- Juegos -->
                <div class="col-md-6">
                    <label for="game" class="form-label">Juegos*</label>
                    <select id="game" name="game" class="form-select" required>
                        <option selected disabled>Seleccione</option>
                        <option value="Mario">Mario</option>
                        <option value="Sonic">Sonic</option>
                    </select>
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
