@php
    $items = [
        ['label' => 'Beranda', 'route' => 'dashboard', 'active' => 'dashboard'],
        ['label' => 'Buat Pesanan Baru', 'route' => 'pesanan.create', 'active' => 'pesanan.create'],
        ['label' => 'Riwayat Transaksi', 'route' => 'riwayat-pesanan.index', 'active' => 'riwayat-pesanan.*'],
    ];
@endphp
<aside class="flex flex-col w-64 h-[calc(100vh-3rem)] px-6 py-8 overflow-y-auto bg-[#d94f87] rounded-[2.5rem] border-r-0 shadow-xl z-10 justify-between">
    <!-- Top Section (Logo) -->
    <div>

        <!-- Navigation Links -->
        <nav class="space-y-4">
            @foreach ($items as $item)
                @php
                    $href = Route::has($item['route']) ? route($item['route']) : '#';
                    $isActive = request()->routeIs($item['active']);
                @endphp
                <a href="{{ $href }}" 
                   class="w-full text-center py-3.5 px-4 rounded-xl font-bold text-sm transition-all duration-200 block shadow-sm
                          {{ $isActive 
                             ? 'text-gray-900 bg-white hover:bg-gray-50' 
                             : 'text-gray-900 bg-pink-800/10 hover:bg-pink-800/20 border border-white/10' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
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