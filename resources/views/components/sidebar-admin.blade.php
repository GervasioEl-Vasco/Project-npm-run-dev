@php
    $items = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => 'dashboard'],
        ['label' => 'Kelola Pesanan', 'route' => 'pesanan.index', 'active' => 'pesanan.*'],
        ['label' => 'Laporan Keuangan', 'route' => 'laporan.index', 'active' => 'laporan.*'],
        ['label' => 'Manajemen Pengguna', 'route' => 'admin.users.index', 'active' => 'admin.users.*'],
    ];
@endphp
<aside class="flex flex-col w-64 h-[calc(100vh-3rem)] px-6 py-8 overflow-y-auto bg-[#d94f87] rounded-[2.5rem] border-r-0 shadow-xl z-10 justify-between">
    <!-- Top Section -->
    <div>

        <div class="mb-6 rounded-2xl bg-pink-800/10 border border-white/10 p-4 text-center">
            <p class="text-xs font-black uppercase tracking-wider text-white">Panel Admin</p>
            <p class="mt-1 text-xs font-semibold text-gray-900">Operasional Laundry</p>
        </div>

        <!-- Navigation Links -->
        <nav class="space-y-3.5">
            <!-- Dashboard / Beranda -->
            @php $isActive = request()->routeIs('dashboard'); @endphp
            <a href="{{ route('dashboard') }}" 
               class="w-full text-center py-3 px-4 rounded-xl font-bold text-sm transition-all duration-200 block shadow-sm
                      {{ $isActive 
                         ? 'text-gray-900 bg-white hover:bg-gray-50' 
                         : 'text-gray-900 bg-pink-800/10 hover:bg-pink-800/20 border border-white/10' }}">
                Beranda
            </a>

            <!-- Kelola Pesanan -->
            @php $isActive = request()->routeIs('pesanan.*'); @endphp
            <a href="{{ route('pesanan.index') }}" 
               class="w-full text-center py-3 px-4 rounded-xl font-bold text-sm transition-all duration-200 block shadow-sm
                      {{ $isActive 
                         ? 'text-gray-900 bg-white hover:bg-gray-50' 
                         : 'text-gray-900 bg-pink-800/10 hover:bg-pink-800/20 border border-white/10' }}">
                Kelola Pesanan
            </a>

            <!-- Riwayat Pesanan -->
            @php $isActive = request()->routeIs('riwayat-pesanan.*'); @endphp
            <a href="{{ route('riwayat-pesanan.index') }}" 
               class="w-full text-center py-3 px-4 rounded-xl font-bold text-sm transition-all duration-200 block shadow-sm
                      {{ $isActive 
                         ? 'text-gray-900 bg-white hover:bg-gray-50' 
                         : 'text-gray-900 bg-pink-800/10 hover:bg-pink-800/20 border border-white/10' }}">
                Riwayat Pesanan
            </a>

            @if(Auth::user()->role === 'admin')
                <!-- Laporan Keuangan -->
                @php $isActive = request()->routeIs('laporan.*'); @endphp
                <a href="{{ route('laporan.index') }}" 
                   class="w-full text-center py-3 px-4 rounded-xl font-bold text-sm transition-all duration-200 block shadow-sm
                          {{ $isActive 
                             ? 'text-gray-900 bg-white hover:bg-gray-50' 
                             : 'text-gray-900 bg-pink-800/10 hover:bg-pink-800/20 border border-white/10' }}">
                    Laporan Keuangan
                </a>

                <!-- Manajemen Pengguna -->
                @php $isActive = request()->routeIs('admin.users.*'); @endphp
                <a href="{{ Route::has('admin.users.index') ? route('admin.users.index') : '#' }}" 
                   class="w-full text-center py-3 px-4 rounded-xl font-bold text-sm transition-all duration-200 block shadow-sm
                          {{ $isActive 
                             ? 'text-gray-900 bg-white hover:bg-gray-50' 
                             : 'text-gray-900 bg-pink-800/10 hover:bg-pink-800/20 border border-white/10' }}">
                    Manajemen Pengguna
                </a>
            @endif
        </nav>
    </div>
    
    <!-- Bottom Section (Logout KELUAR) -->
    <div class="mt-8 pt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full bg-pink-800/10 hover:bg-pink-800/20 border border-white/10 text-gray-900 font-extrabold py-3.5 px-4 rounded-xl tracking-widest text-center uppercase transition duration-200 text-sm">
                KELUAR
            </button>
        </form>
    </div>
</aside>