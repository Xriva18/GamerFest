@props(['value'])

<link rel="stylesheet" href="{{ asset('css/inscripcion.css') }}">

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white m-2']) }}>
    {{ $value ?? $slot }}
</label>
