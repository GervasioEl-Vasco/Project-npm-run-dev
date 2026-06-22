@props(['type' => 'info'])

@php
    $classes = match ($type) {
        'success' => 'bg-green-50 text-green-800 border-green-200',
        'danger' => 'bg-red-50 text-red-800 border-red-200',
        'warning' => 'bg-yellow-50 text-yellow-800 border-yellow-200',
        default => 'bg-brand-50 text-brand-800 border-brand-200',
    };
@endphp

<div {{ $attributes->merge(['class' => "p-4 mb-4 text-sm border rounded-lg $classes"]) }} role="alert">
    <span class="font-semibold">{{ $slot }}</span>
</div>