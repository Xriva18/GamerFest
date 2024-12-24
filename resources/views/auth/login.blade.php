@extends('layouts.main') <!-- Usa el layout base -->

@section('title', 'Login')
@section('content')
    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="flex items-center mb-2 mt-3">
                <x-input-label for="email" :value="__('Email:')" class="w-1/4 mr-4" />
                <div class="w-3/4">
                    <x-text-input id="email" class="block w-full rounded" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <!-- Password -->
            <div class="flex items-center mb-2">
                <x-input-label for="password" :value="__('Contraseña:')" class="w-1/4 mr-4" />
                <div class="w-3/4">
                    <x-text-input id="password" class="block w-full rounded" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-5">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            {{-- 
                <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            --}}


            <x-primary-button class="my-3">
                {{ __('Log in') }}
            </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
@endsection
