<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Apellido -->
        <div class="mt-4">
            <x-input-label for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')"
                autocomplete="apellido" />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>

        <!-- Universidad -->
        <div class="mt-4">
            <x-input-label for="universidad" :value="__('Universidad')" />
            <select id="universidad" name="universidad" class="block mt-1 w-full">
                <option value="">{{ __('Selecciona una universidad') }}</option>
            </select>
            <x-input-error :messages="$errors->get('universidad')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma la contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Login') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Inscribirse') }}
            </x-primary-button>
        </div>


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
                        option.value = universidad.nombre;
                        option.textContent = universidad.nombre;
                        select.appendChild(option);
                    });
                } catch (error) {
                    console.error(error.message);
                }
            });
        </script>
    </form>
</x-guest-layout>
