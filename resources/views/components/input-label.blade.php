@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-semibold text-[#AA5486]']) }}>
    {{ $value ?? $slot }}
</label>
