@props([
    'notifications' => [],
    'unreadCount' => null,
])

@php
    $notificationItems = collect($notifications);
    $calculatedUnreadCount = $unreadCount ?? $notificationItems->where('unread', true)->count();
@endphp

<div {{ $attributes->merge(['class' => 'relative']) }} x-data="{ open: false }" @click.outside="open = false">
    <button
        type="button"
        class="relative inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 shadow-sm transition-colors hover:bg-brand-50 hover:text-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2"
        aria-label="Buka notifikasi"
        @click="open = ! open"
    >
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2a2 2 0 0 1-.6 1.4L4 17h5" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a3 3 0 0 0 6 0" />
        </svg>

        @if ($calculatedUnreadCount > 0)
            <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-red-600 px-1 text-xs font-bold text-white ring-2 ring-white">
                {{ $calculatedUnreadCount > 9 ? '9+' : $calculatedUnreadCount }}
            </span>
        @endif
    </button>

    <div
        x-cloak
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute right-0 z-50 mt-3 w-80 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-xl"
        style="display: none;"
    >
        <div class="flex items-center justify-between border-b border-gray-100 px-4 py-3">
            <div>
                <p class="text-sm font-bold text-gray-900">Notifikasi</p>
                <p class="text-xs text-gray-500">{{ $calculatedUnreadCount }} belum dibaca</p>
            </div>

            <span class="rounded-full bg-brand-50 px-2.5 py-1 text-xs font-semibold text-brand-700">
                Laundry
            </span>
        </div>

        <div class="max-h-80 overflow-y-auto">
            @forelse ($notificationItems as $notification)
                @php
                    $isUnread = (bool) data_get($notification, 'unread', false);
                    $href = data_get($notification, 'href', '#');
                @endphp

                <a
                    href="{{ $href }}"
                    class="block border-b border-gray-100 px-4 py-3 transition-colors last:border-b-0 hover:bg-gray-50"
                >
                    <div class="flex gap-3">
                        <span @class([
                            'mt-1 h-2.5 w-2.5 shrink-0 rounded-full',
                            'bg-brand-600' => $isUnread,
                            'bg-gray-300' => ! $isUnread,
                        ])></span>

                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-semibold text-gray-900">
                                {{ data_get($notification, 'title', 'Status laundry diperbarui') }}
                            </span>
                            <span class="mt-1 block text-sm text-gray-600">
                                {{ data_get($notification, 'body', 'Pesanan kamu memiliki pembaruan status terbaru.') }}
                            </span>
                            <span class="mt-2 block text-xs font-medium text-gray-400">
                                {{ data_get($notification, 'time', 'Baru saja') }}
                            </span>
                        </span>
                    </div>
                </a>
            @empty
                <div class="px-4 py-8 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-brand-50 text-brand-700">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v10l4-4h12Z" />
                        </svg>
                    </div>
                    <p class="mt-3 text-sm font-semibold text-gray-900">Belum ada notifikasi</p>
                    <p class="mt-1 text-sm text-gray-500">Update pesanan akan muncul di sini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
