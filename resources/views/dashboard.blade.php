<x-app-layout>
    <div class="space-y-8">
        
        @if(Auth::user()->role === 'admin' || Auth::user()->role === 'staff')
            <!-- Welcome Header Card (Admin/Staff) -->
            <div class="bg-white overflow-hidden shadow-xl rounded-3xl border border-pink-100/50 p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 relative">
                <div class="space-y-2">
                    <h3 class="text-3xl font-black text-gray-800">Halo, <span class="text-[#d94f87]">{{ Auth::user()->name }} !</span></h3>
                    <p class="text-gray-600 text-sm font-medium">
                        Selamat datang kembali di panel kontrol PING! Laundry. Status login anda sebagai: <span class="text-[#d94f87] font-black uppercase">{{ Auth::user()->role }}</span>
                    </p>
                </div>
                <div class="text-sm font-medium text-gray-400 whitespace-nowrap">
                    Hari ini: {{ date('d F Y') }}
                </div>
            </div>

            <!-- MENU UTAMA BERDASARKAN ROLE (ADMIN & STAFF) -->
            <div class="space-y-6">
                <div class="flex items-center gap-2 mb-6">
                    <span class="h-6 w-1.5 rounded-full bg-[#d94f87]"></span>
                    <h4 class="text-xl font-bold text-gray-900 uppercase tracking-wide">MENU MANAJEMEN ADMIN</h4>
                </div>

                <!-- Grid Card Menu Utama -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Kelola Pesanan -->
                    <a href="{{ route('pesanan.index') }}" class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between h-56 border border-pink-100/50">
                        <div class="w-14 h-14 bg-[#e8a3c0]/40 rounded-2xl flex items-center justify-center text-[#ba2b65] shrink-0 shadow-sm">
                            <!-- Paket/Box Icon -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div>
                            <h5 class="font-extrabold text-gray-900 text-lg">Kelola Pesanan</h5>
                            <p class="text-xs text-gray-500 mt-1">Input cucian baru & kelola progres cucian aktif</p>
                        </div>
                    </a>

                    <!-- Konfirmasi Pembayaran -->
                    <a href="{{ route('pembayaran.index') }}" class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between h-56 border border-pink-100/50">
                        <div class="w-14 h-14 bg-[#e8a3c0]/40 rounded-2xl flex items-center justify-center text-[#ba2b65] shrink-0 shadow-sm">
                            <!-- Uang/Banknote Icon -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h5 class="font-extrabold text-gray-900 text-lg">Pembayaran</h5>
                            <p class="text-xs text-gray-500 mt-1">Konfirmasi nota lunas & status pembayaran</p>
                        </div>
                    </a>

                    <!-- Laporan Bulanan -->
                    <a href="{{ route('laporan.index') }}" class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between h-56 border border-pink-100/50">
                        <div class="w-14 h-14 bg-[#e8a3c0]/40 rounded-2xl flex items-center justify-center text-[#ba2b65] shrink-0 shadow-sm">
                            <!-- Chart Bar Icon -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h5 class="font-extrabold text-gray-900 text-lg">Laporan Keuangan</h5>
                            <p class="text-xs text-gray-500 mt-1">Cek grafik transaksi mingguan & total omzet</p>
                        </div>
                    </a>
                </div>
            </div>
        @else
            <!-- Welcome Header Card (Customer) -->
            <div class="bg-white overflow-hidden shadow-xl rounded-3xl border border-pink-100/50 p-8 flex flex-col md:flex-row justify-between items-center gap-6 relative">
                <div class="space-y-2">
                    <h3 class="text-3xl font-black text-gray-800">Halo, <span class="text-[#d94f87]">{{ Auth::user()->name }} !</span></h3>
                    <p class="text-gray-600 text-sm font-medium">
                        Selamat datang kembali di panel kontrol PING! Laundry. Status anda sebagai :
                    </p>
                    <span class="inline-block px-4 py-1.5 text-xs font-bold uppercase rounded-full bg-[#d94f87]/15 text-[#d94f87] border border-[#d94f87]/20 shadow-sm">
                        {{ Auth::user()->role }}
                    </span>
                </div>
            </div>

            <!-- Tampilan Khusus CUSTOMER (Pelanggan) -->
            <div class="space-y-6">
                <div class="flex items-center gap-2 mb-6">
                    <span class="h-6 w-1.5 rounded-full bg-[#d94f87]"></span>
                    <h4 class="text-xl font-bold text-gray-900">Menu Pelanggan</h4>
                </div>

                <!-- Grid Card Menu Utama -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Pesanan Baru -->
                    <a href="{{ route('pesanan.create') }}" class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-300 flex items-center gap-6">
                        <div class="w-16 h-16 bg-[#e8a3c0]/40 rounded-2xl flex items-center justify-center text-[#ba2b65] shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-xl font-extrabold text-gray-900">Buat Pesanan Baru</h5>
                            <p class="text-sm text-gray-500 mt-1">Kirim cucian baru anda langsung ke outlet</p>
                        </div>
                    </a>

                    <!-- Riwayat Pesanan -->
                    <a href="{{ route('riwayat-pesanan.index') }}" class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-300 flex items-center gap-6">
                        <div class="w-16 h-16 bg-[#e8a3c0]/40 rounded-2xl flex items-center justify-center text-[#ba2b65] shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-xl font-extrabold text-gray-900">Riwayat Pesanan</h5>
                            <p class="text-sm text-gray-500 mt-1">Lihat kembali nota Pembayaran anda terdahulu</p>
                        </div>
                    </a>
                </div>
            </div>
        @endif

    </div>
</x-app-layout>