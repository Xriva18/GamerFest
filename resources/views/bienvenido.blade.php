{{-- resources/views/bienvenido.blade.php --}}
@extends('layouts.main') <!-- Usa el layout base -->

@section('title', 'Bienvenido') <!-- Cambia el título para esta vista -->

@section('content') <!-- Define el contenido que irá en la sección content -->
    <x-guest-layout>
        <div class="max-w-md mx-auto shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-center mb-4">¡Bienvenido!</h2>
            <p class="text-center mb-6">Ya estás inscrito a <strong>Gamer Fest 2025</strong>.</p>

            <div class="flex justify-center">
                <x-primary-button onclick="window.location.href='{{ route('login') }}'">
                    {{ __('Ingrese') }}
                </x-primary-button>
            </div>
        </div>
    </x-guest-layout>
@endsection
