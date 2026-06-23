<aside class="flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto bg-white border-r border-gray-200 shadow-sm z-10">
    <div class="flex items-center justify-center mb-8">
        <h2 class="text-2xl font-black text-gray-900 tracking-tighter uppercase">
            PING <span class="text-brand-600">Laundry</span> Express
        </h2>
    </div>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="space-y-2">
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-700 bg-brand-50 rounded-lg font-medium border-l-4 border-brand-600">
                Beranda
            </a>
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 transition-colors rounded-lg hover:text-gray-900 hover:bg-gray-100 font-medium">
                Buat Pesanan Baru
            </a>
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 transition-colors rounded-lg hover:text-gray-900 hover:bg-gray-100 font-medium">
                Lacak Cucian
            </a>
            <a href="#" class="flex items-center px-4 py-2.5 text-gray-600 transition-colors rounded-lg hover:text-gray-900 hover:bg-gray-100 font-medium">
                Riwayat Transaksi
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