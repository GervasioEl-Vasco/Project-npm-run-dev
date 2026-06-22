@php
    $items = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => 'dashboard'],
        ['label' => 'Kelola Pesanan', 'route' => 'pesanan.index', 'active' => 'pesanan.*'],
        ['label' => 'Checking & Status', 'route' => 'pesanan.index', 'active' => 'pengecekan.*'],
        ['label' => 'Laporan Keuangan', 'route' => 'laporan.index', 'active' => 'laporan.*'],
        ['label' => 'Manajemen Pengguna', 'route' => 'admin.users.index', 'active' => 'admin.users.*'],
    ];
@endphp
<aside {{ $attributes->merge(['class' => 'space-y-6']) }}>
    <div class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-xs font-semibold uppercase tracking-wide text-teal-700">Admin</p>
        <p class="mt-1 text-sm text-slate-500">Pantau operasional laundry harian.</p>
    </div>
    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="space-y-2">
            @foreach ($items as $item)
                @php
                    $href = Route::has($item['route']) ? route($item['route']) : '#';
                    $isActive = request()->routeIs($item['active']);
                @endphp
                <a href="{{ $href }}" 
                   class="flex items-center px-4 py-2.5 rounded-lg font-medium transition-colors 
                          {{ $isActive 
                             ? 'text-gray-700 bg-brand-50 border-l-4 border-brand-600' 
                             : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
        
        <div class="mt-8 border-t border-gray-200 pt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-2.5 text-red-600 transition-colors rounded-lg hover:bg-red-50 font-medium">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</aside>