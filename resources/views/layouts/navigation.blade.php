<nav x-data="{ open: false }" class="bg-transparent border-0 py-4 relative z-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Left spacer to balance logo in the center -->
            <div class="flex-1"></div>

            <!-- Center spacer (menggunakan logo dari background) -->
            <div class="flex-1"></div>

            <!-- Right Profile Dropdown Pill -->
            <div class="flex-1 flex justify-end">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-3 bg-white/95 px-4 py-2 rounded-full shadow-md border border-pink-100 hover:shadow-lg hover:bg-white transition duration-200 focus:outline-none">
                            <img class="h-8 w-8 rounded-full object-cover border border-pink-200" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=ba2b65&background=fce7f3&bold=true" alt="{{ Auth::user()->name }}">
                            <div class="text-sm font-bold text-gray-800">{{ Auth::user()->name }}</div>
                            <svg class="fill-current h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="block px-4 py-2 text-xs text-gray-400 border-b border-gray-100">
                            Status: <span class="font-bold text-pink-600 uppercase">{{ Auth::user()->role }}</span>
                        </div>
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
        </div>
    </div>
</nav>
