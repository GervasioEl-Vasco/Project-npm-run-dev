@props([
    'steps' => null,
    'current' => null,
])

@php
    $defaultSteps = [
        ['label' => 'Diterima', 'description' => 'Pesanan sudah masuk ke sistem.', 'state' => 'complete'],
        ['label' => 'Checking', 'description' => 'Admin memeriksa detail cucian.', 'state' => 'complete'],
        ['label' => 'Dicuci', 'description' => 'Laundry sedang diproses.', 'state' => 'current'],
        ['label' => 'Selesai', 'description' => 'Pesanan siap diambil.', 'state' => 'pending'],
    ];

    $timelineSteps = collect($steps ?? $defaultSteps)
        ->map(fn ($step) => is_string($step) ? ['label' => $step] : $step)
        ->values();

    $currentIndex = $current
        ? $timelineSteps->search(fn ($step) => data_get($step, 'label') === $current)
        : false;
@endphp

<div {{ $attributes->merge(['class' => 'space-y-4']) }}>
    @foreach ($timelineSteps as $index => $step)
        @php
            $state = data_get($step, 'state', 'pending');

            if ($currentIndex !== false) {
                $state = $index < $currentIndex ? 'complete' : ($index === $currentIndex ? 'current' : 'pending');
            }

            $isComplete = $state === 'complete';
            $isCurrent = $state === 'current';
            $isLast = $loop->last;
        @endphp

        <div class="relative flex gap-4">
            @unless ($isLast)
                <span @class([
                    'absolute left-4 top-9 h-full w-0.5',
                    'bg-brand-600' => $isComplete,
                    'bg-gray-200' => ! $isComplete,
                ]) aria-hidden="true"></span>
            @endunless

            <div @class([
                'relative z-10 flex h-8 w-8 shrink-0 items-center justify-center rounded-full border-2 text-xs font-bold',
                'border-brand-600 bg-brand-600 text-white' => $isComplete,
                'border-brand-600 bg-white text-brand-700 ring-4 ring-brand-50' => $isCurrent,
                'border-gray-200 bg-white text-gray-400' => ! $isComplete && ! $isCurrent,
            ])>
                @if ($isComplete)
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0L3.3 9.7a1 1 0 0 1 1.4-1.4l3.8 3.8 6.8-6.8a1 1 0 0 1 1.4 0Z" clip-rule="evenodd" />
                    </svg>
                @else
                    {{ $index + 1 }}
                @endif
            </div>

            <div class="min-w-0 flex-1 pb-5">
                <div class="flex flex-wrap items-center gap-2">
                    <p @class([
                        'font-bold',
                        'text-gray-900' => $isComplete || $isCurrent,
                        'text-gray-500' => ! $isComplete && ! $isCurrent,
                    ])>
                        {{ data_get($step, 'label', 'Status') }}
                    </p>

                    @if ($isCurrent)
                        <span class="rounded-full bg-brand-50 px-2.5 py-1 text-xs font-semibold text-brand-700">
                            Saat ini
                        </span>
                    @endif
                </div>

                @if (data_get($step, 'description'))
                    <p class="mt-1 text-sm text-gray-500">
                        {{ data_get($step, 'description') }}
                    </p>
                @endif

                @if (data_get($step, 'time'))
                    <p class="mt-2 text-xs font-medium text-gray-400">
                        {{ data_get($step, 'time') }}
                    </p>
                @endif
            </div>
        </div>
    @endforeach
</div>
