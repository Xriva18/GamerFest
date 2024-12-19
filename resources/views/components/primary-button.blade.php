<button {{ $attributes->merge(['type' => 'submit', 'class' => 'ins-btn']) }}>
    {{ $slot }}
</button>
