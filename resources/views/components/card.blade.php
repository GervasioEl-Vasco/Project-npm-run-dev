<div {{ $attributes->merge(['class' => 'bg-white border-2 border-brand-dark shadow-solid rounded-none overflow-hidden']) }}>
    @if (isset($header))
        <div class="px-6 py-4 border-b-2 border-brand-dark bg-brand-light font-display text-lg uppercase font-bold tracking-wide">
            {{ $header }}
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>

    @if (isset($footer))
        <div class="px-6 py-4 border-t-2 border-brand-dark bg-gray-50">
            {{ $footer }}
        </div>
    @endif
</div>