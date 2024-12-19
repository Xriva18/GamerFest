@extends('layouts.main') <!-- Usa el layout base -->

@section('title', 'Inscripción') <!-- Cambia el título para esta vista -->

@section('content') <!-- Define el contenido que irá en la sección content -->
    <div class="container">
        <h1>Página de Inscripción</h1>
        <p>Bienvenido a la página de inscripción. Aquí puedes realizar tu registro.</p>
        <a href="{{ url('/') }}">Volver al inicio</a>
    </div>
@endsection
