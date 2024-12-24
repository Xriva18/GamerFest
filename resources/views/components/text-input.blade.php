@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'ins-input p-2']) }}>
