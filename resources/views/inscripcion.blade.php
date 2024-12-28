@extends('layouts.main') <!-- Usa el layout base -->

@section('title', 'Inscripción') <!-- Cambia el título para esta vista -->

@section('content') <!-- Define el contenido que irá en la sección content -->
    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <!-- Nombre -->
            <div class="flex items-center mb-2">
                <x-input-label for="name" :value="__('Nombre:')" class="w-1/4 mr-4" />
                <div class="w-3/4">
                    <x-text-input id="name" class="block w-full rounded " type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>

            <!-- Apellido -->
            <div class="flex items-center mb-2">
                <x-input-label for="apellido" :value="__('Apellido:')" class="w-1/4 mr-4" />
                <div class="w-3/4">
                    <x-text-input id="apellido" class="block w-full rounded " type="text" name="apellido"
                        :value="old('apellido')" autocomplete="apellido" />
                    <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                </div>
            </div>

            <!-- Universidad -->
            <div class="flex items-center mb-2">
                <x-input-label for="universidad" :value="__('Universidad:')" class="w-1/4 mr-4 text-sm" />
                <div class="w-3/4">
                    <select id="universidad" name="universidad" class="rounded p-1 ins-input">
                        <option value="">{{ __('Selecciona una universidad') }}</option>
                        <!-- Agrega aquí las opciones de universidades -->
                    </select>
                    <x-input-error :messages="$errors->get('universidad')" class="mt-2 text-sm text-red-500" />
                </div>
            </div>


            <!-- Email Address -->
            <div class="flex items-center mb-2">
                <x-input-label for="email" :value="__('Email:')" class="w-1/4 mr-4" />
                <div class="w-3/4">
                    <x-text-input id="email" class="block w-full rounded " type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <!-- Password -->
            <div class="flex items-center mb-2">
                <x-input-label for="password" :value="__('Contraseña:')" class="w-1/4 mr-4" />
                <div class="w-3/4">
                    <x-text-input id="password" class="block w-full rounded " type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="flex items-center mb-2">
                <x-input-label for="password_confirmation" :value="__('Confirma la contraseña:')" class="w-1/4 mr-4" />
                <div class="w-3/4">
                    <x-text-input id="password_confirmation  " class="block w-full rounded " type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-secondary-button href="{{ url('/login') }}">
                    {{ __('Login') }}
                </x-secondary-button>

                <x-primary-button class="ml-4 ">
                    {{ __('Inscribirse') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', async () => {
        try {
            const response = await fetch('{{ route('universidades.index') }}');
            if (!response.ok) {
                throw new Error('No se pudieron cargar las universidades');
            }

            const universidades = await response.json();
            const select = document.getElementById('universidad');

            universidades.forEach(universidad => {
                const option = document.createElement('option');
                // Aquí usas el 'id' como value
                option.value = universidad.id;
                option.textContent = universidad.nombre;
                select.appendChild(option);
            });
        } catch (error) {
            console.error(error.message);
        }
    });
</script>
