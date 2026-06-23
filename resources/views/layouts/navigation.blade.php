@php
    $navigationItems = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => 'dashboard'],
        ['label' => 'Pesanan', 'route' => 'pesanan.index', 'active' => 'pesanan.*'],
        ['label' => 'Tracking', 'route' => null, 'active' => 'tracking.*'],
        ['label' => 'Riwayat', 'route' => 'history.index', 'active' => 'history.*'],
    ];
@endphp

<nav x-data="{ open: false }" class="border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    </a>
                </div>  

                <div class="hidden gap-6 sm:-my-px sm:ms-10 sm:flex">
                    @foreach ($navigationItems as $item)
                        @php
                            $href = $item['route'] && Route::has($item['route']) ? route($item['route']) : '#';
                        @endphp

                        <x-nav-link :href="$href" :active="request()->routeIs($item['active'])">
                            {{ $item['label'] }}
                        </x-nav-link>
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 rounded-md border border-slate-200 bg-white px-3 py-2 text-sm font-medium leading-4 text-slate-600 shadow-sm transition hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-teal-50 text-xs font-semibold text-teal-700">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            <div>{{ Auth::user()->name }}</div>

                            <div>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-md p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            @foreach ($navigationItems as $item)
                @php
                    $href = $item['route'] && Route::has($item['route']) ? route($item['route']) : '#';
                @endphp

                <x-responsive-nav-link :href="$href" :active="request()->routeIs($item['active'])">
                    {{ $item['label'] }}
                </x-responsive-nav-link>
            @endforeach
        </div>

        <div class="border-t border-slate-200 pb-1 pt-4">
            <div class="px-4">
                <div class="text-base font-semibold text-slate-900">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-slate-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
