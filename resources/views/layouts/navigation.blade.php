<nav x-data="{ open: false }" class="bg-transparent border-0 py-4 relative z-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Left Mobile Menu Button (Hamburger) -->
            <div class="flex-1 flex justify-start items-center">
                <button @click="open = !open" class="block lg:hidden inline-flex items-center justify-center p-2.5 rounded-full bg-white/95 border border-pink-100 shadow-md text-[#ba2b65] hover:bg-white transition focus:outline-none">
                    <svg class="h-5 h-5 w-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

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

    <!-- Mobile Sidebar Drawer Overlay -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm lg:hidden"
         style="display: none;"
         @click="open = false">
    </div>
    
    <!-- Mobile Navigation Drawer -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed inset-y-0 left-0 z-50 w-64 p-6 bg-[#d94f87] shadow-2xl flex flex-col justify-between lg:hidden rounded-r-[2rem]"
         style="display: none;">
         
         <div>
             <!-- Close Button & Label -->
             <div class="flex justify-between items-center mb-8 border-b border-white/10 pb-4">
                 <span class="text-white font-extrabold tracking-widest text-xs uppercase">Menu Utama</span>
                 <button @click="open = false" class="text-white hover:text-pink-200 focus:outline-none">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                     </svg>
                 </button>
             </div>
             
             <!-- Navigation Links -->
             <nav class="space-y-4">
                 @php
                     $isAdminOrStaff = in_array(Auth::user()?->role, ['admin', 'staff']);
                     $menuItems = $isAdminOrStaff ? [
                         ['label' => 'Beranda', 'route' => 'dashboard', 'active' => 'dashboard'],
                         ['label' => 'Kelola Pesanan', 'route' => 'pesanan.index', 'active' => 'pesanan.*'],
                         ['label' => 'Riwayat Pesanan', 'route' => 'riwayat-pesanan.index', 'active' => 'riwayat-pesanan.*'],
                         ['label' => 'Laporan Keuangan', 'route' => 'laporan.index', 'active' => 'laporan.*'],
                         ['label' => 'Manajemen Pengguna', 'route' => 'admin.users.index', 'active' => 'admin.users.*'],
                     ] : [
                         ['label' => 'Beranda', 'route' => 'dashboard', 'active' => 'dashboard'],
                         ['label' => 'Buat Pesanan Baru', 'route' => 'pesanan.create', 'active' => 'pesanan.create'],
                         ['label' => 'Riwayat Transaksi', 'route' => 'riwayat-pesanan.index', 'active' => 'riwayat-pesanan.*'],
                     ];
                 @endphp
                 
                 @foreach ($menuItems as $item)
                     @php
                         $href = Route::has($item['route']) ? route($item['route']) : '#';
                         $isActive = request()->routeIs($item['active']);
                     @endphp
                     <a href="{{ $href }}" 
                        class="w-full text-center py-3 px-4 rounded-xl font-bold text-sm transition-all duration-200 block shadow-sm
                               {{ $isActive 
                                  ? 'text-gray-900 bg-white hover:bg-gray-50' 
                                  : 'text-gray-900 bg-pink-800/10 hover:bg-pink-800/20 border border-white/10' }}">
                         {{ $item['label'] }}
                     </a>
                 @endforeach
             </nav>
         </div>
         
         <!-- Logout KELUAR Button -->
         <div class="pt-4 border-t border-white/10">
             <form method="POST" action="{{ route('logout') }}">
                 @csrf
                 <button type="submit" class="w-full bg-pink-800/10 hover:bg-pink-800/20 border border-white/10 text-gray-900 font-extrabold py-3.5 px-4 rounded-xl tracking-widest text-center uppercase transition duration-200 text-sm">
                     KELUAR
                 </button>
             </form>
         </div>
    </div>
</nav>
