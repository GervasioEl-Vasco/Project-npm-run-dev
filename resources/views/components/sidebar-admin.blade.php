@php
    $items = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => 'dashboard'],
        ['label' => 'Pesanan Masuk', 'route' => 'orders.index', 'active' => 'orders.*'],
        ['label' => 'Checking', 'route' => 'checking.index', 'active' => 'checking.*'],
        ['label' => 'Laporan', 'route' => 'reports.index', 'active' => 'reports.*'],
        ['label' => 'Pengguna', 'route' => 'admin.users.index', 'active' => 'admin.users.*'],
    ];
@endphp

<aside {{ $attributes->merge(['class' => 'space-y-6']) }}>
    <div class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
        <p class="text-xs font-semibold uppercase tracking-wide text-teal-700">Admin</p>
        <p class="mt-1 text-sm text-slate-500">Pantau operasional laundry harian.</p>
    </div>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="space-y-2">
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-700 bg-brand-50 rounded-lg font-medium border-l-4 border-brand-600">
                Dashboard
            </a>
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 transition-colors rounded-lg hover:text-gray-900 hover:bg-gray-100 font-medium">
                Kelola Pesanan
            </a>
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 transition-colors rounded-lg hover:text-gray-900 hover:bg-gray-100 font-medium">
                Checking & Status
            </a>
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 transition-colors rounded-lg hover:text-gray-900 hover:bg-gray-100 font-medium">
                Laporan Keuangan
            </a>
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 transition-colors rounded-lg hover:text-gray-900 hover:bg-gray-100 font-medium">
                Manajemen Pengguna
            </a>
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