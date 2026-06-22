<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Utama') }}
        </h2>
    </x-slot>

    <!-- Background dengan nuansa Pink lembut -->
    <div class="py-12 bg-gradient-to-b from-pink-50/50 to-white min-h-[calc(100vh-65px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Header Card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-pink-100 p-8 flex flex-col md:flex-row justify-between items-center gap-6 relative">
                <!-- Bubble Hiasan -->
                <div class="absolute right-0 top-0 w-24 h-24 rounded-full bg-pink-500/5 -translate-y-6 translate-x-6"></div>
                
                <div class="space-y-2">
                    <h3 class="text-3xl font-black text-gray-800">Halo, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-gray-500 text-sm">
                        Selamat datang kembali di panel kontrol PING! Laundry. Status login Anda sebagai: 
                        <span class="px-3 py-1 text-xs font-bold uppercase rounded-full bg-pink-100 text-pink-700 border border-pink-200">
                            {{ Auth::user()->role }}
                        </span>
                    </p>
                </div>
                
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-400 font-medium">Hari ini: {{ date('d M Y') }}</span>
                    <span class="text-2xl">🧺</span>
                </div>
            </div>

            <!-- MENU UTAMA BERDASARKAN ROLE -->
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'staff')
                
                <!-- Tampilan Khusus ADMIN & STAFF -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2">
                        <span class="h-6 w-2 rounded-full bg-pink-600"></span>
                        <h4 class="text-lg font-bold text-gray-800 uppercase tracking-wide">Menu Manajemen Admin</h4>
                    </div>

                    <!-- Grid Card Menu Utama -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Kelola Pesanan -->
                        <a href="{{ route('pesanan.index') }}" class="bg-white p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col justify-between h-40">
                            <span class="text-3xl bg-pink-50 p-2 rounded-xl w-fit">📦</span>
                            <div>
                                <h5 class="font-bold text-gray-800 text-lg">Kelola Pesanan</h5>
                                <p class="text-xs text-gray-400 mt-1">Input cucian baru & kelola progres cucian aktif.</p>
                            </div>
                        </a>

                        <!-- Pengecekan Barang -->
                        <a href="{{ route('pesanan.index') }}" class="bg-white p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col justify-between h-40">
                            <span class="text-3xl bg-pink-50 p-2 rounded-xl w-fit">🔍</span>
                            <div>
                                <h5 class="font-bold text-gray-800 text-lg">Pengecekan Fisik</h5>
                                <p class="text-xs text-gray-400 mt-1">Lakukan sortir & checklist temuan barang di saku.</p>
                            </div>
                        </a>

                        <!-- Konfirmasi Pembayaran -->
                        <a href="{{ route('pembayaran.index') }}" class="bg-white p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col justify-between h-40">
                            <span class="text-3xl bg-pink-50 p-2 rounded-xl w-fit">💵</span>
                            <div>
                                <h5 class="font-bold text-gray-800 text-lg">Pembayaran</h5>
                                <p class="text-xs text-gray-400 mt-1">Konfirmasi nota lunas & status pembayaran.</p>
                            </div>
                        </a>

                        <!-- Laporan Bulanan -->
                        <a href="{{ route('laporan.index') }}" class="bg-white p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col justify-between h-40">
                            <span class="text-3xl bg-pink-50 p-2 rounded-xl w-fit">📊</span>
                            <div>
                                <h5 class="font-bold text-gray-800 text-lg">Laporan Keuangan</h5>
                                <p class="text-xs text-gray-400 mt-1">Cek grafik transaksi mingguan & total omzet.</p>
                            </div>
                        </a>
                    </div>
                </div>

            @else
                
                <!-- Tampilan Khusus CUSTOMER (Pelanggan) -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2">
                        <span class="h-6 w-2 rounded-full bg-pink-600"></span>
                        <h4 class="text-lg font-bold text-gray-800 uppercase tracking-wide">Menu Pelanggan</h4>
                    </div>

                    <!-- Grid Card Menu Utama -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <!-- Pesanan Baru -->
                        <a href="{{ route('pesanan.create') }}" class="bg-white p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col justify-between h-40">
                            <span class="text-3xl bg-pink-50 p-2 rounded-xl w-fit">➕</span>
                            <div>
                                <h5 class="font-bold text-gray-800 text-lg">Buat Pesanan Baru</h5>
                                <p class="text-xs text-gray-400 mt-1">Kirim cucian baru Anda langsung ke outlet.</p>
                            </div>
                        </a>

                        <!-- Lacak Status Pakaian -->
                        <a href="{{ route('pesanan.index') }}" class="bg-white p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col justify-between h-40">
                            <span class="text-3xl bg-pink-50 p-2 rounded-xl w-fit">🔍</span>
                            <div>
                                <h5 class="font-bold text-gray-800 text-lg">Lacak Cucian</h5>
                                <p class="text-xs text-gray-400 mt-1">Lihat status pengerjaan pakaian secara real-time.</p>
                            </div>
                        </a>

                        <!-- Riwayat Pesanan -->
                        <a href="{{ route('history.index') }}" class="bg-white p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col justify-between h-40">
                            <span class="text-3xl bg-pink-50 p-2 rounded-xl w-fit">📜</span>
                            <div>
                                <h5 class="font-bold text-gray-800 text-lg">Riwayat Pesanan</h5>
                                <p class="text-xs text-gray-400 mt-1">Lihat kembali detail nota pembayaran Anda terdahulu.</p>
                            </div>
                        </a>
                    </div>
                </div>

            @endif

        </div>
    </div>
</x-app-layout>