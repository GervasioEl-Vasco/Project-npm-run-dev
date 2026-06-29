<x-app-layout>
    <div class="space-y-6">
        
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Data Pesanan Aktif</h2>
            <a href="{{ route('pesanan.create') }}" class="bg-[#e8a3c0] hover:bg-[#e49bb7] text-[#ba2b65] font-extrabold py-2.5 px-6 rounded-full shadow-sm text-sm transition duration-200 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Pesanan Baru</span>
            </a>
        </div>

        <!-- Card Container -->
        <div class="bg-white rounded-[2rem] shadow-xl border border-pink-100/50 p-8">
            
            <!-- Table Container -->
            <div class="overflow-x-auto rounded-[2rem] border border-gray-300 shadow-sm">
                <table class="min-w-full bg-white divide-y divide-gray-300">
                    <thead class="bg-[#e8a3c0]/60">
                        <tr>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">ID Pesanan</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Pelanggan</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Layanan</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Berat</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Total Biaya</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Status</th>
                            <th class="py-4 px-6 text-center text-sm font-extrabold text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($pesanan as $pesanan_item)
                        <tr class="hover:bg-pink-50/20 transition duration-150">
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm font-bold text-gray-900">#ORD-{{ $pesanan_item->id }}</td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm text-gray-800">{{ $pesanan_item->user->name }}</td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm text-gray-800">{{ $pesanan_item->layanan->nama_layanan }}</td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm text-gray-700 font-medium">{{ $pesanan_item->berat_jumlah }} Kg</td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm font-semibold text-gray-800">
                                Rp {{ number_format($pesanan_item->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                                    {{ $pesanan_item->status_pesanan == 'diambil' ? 'bg-green-100 text-green-700 border border-green-200' : 
                                      ($pesanan_item->status_pesanan == 'selesai' ? 'bg-teal-100 text-teal-700 border border-teal-200' : 
                                        ($pesanan_item->status_pesanan == 'diproses' || $pesanan_item->status_pesanan == 'proses' ? 'bg-blue-100 text-blue-700 border border-blue-200' : 
                                          ($pesanan_item->status_pesanan == 'dibatalkan' ? 'bg-red-100 text-red-700 border border-red-200' : 'bg-yellow-100 text-yellow-700 border border-yellow-200'))) }}">
                                    {{ $pesanan_item->status_pesanan }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center text-sm">
                                <div class="flex flex-col sm:flex-row items-center justify-center gap-2">
                                    @if(auth()->user()->role === 'customer')
                                        @if($pesanan_item->status_pembayaran === 'belum_bayar')
                                            @if($pesanan_item->pembayaran && $pesanan_item->pembayaran->status === 'menunggu_konfirmasi')
                                                <span class="text-gray-500 italic text-xs font-medium">Menunggu Konfirmasi</span>
                                            @else
                                                <a href="{{ route('pembayaran.create', $pesanan_item->id) }}" class="inline-block bg-[#d94f87] hover:bg-pink-700 text-white font-bold py-1.5 px-4 rounded-full transition duration-200 shadow-sm text-xs uppercase tracking-wider">
                                                    Bayar Tagihan
                                                </a>
                                            @endif
                                        @else
                                            <span class="text-green-600 font-extrabold text-xs uppercase tracking-wider">Lunas</span>
                                        @endif
                                    @else
                                        <a href="{{ route('status.edit', $pesanan_item->id) }}" class="inline-block bg-[#d94f87] hover:bg-pink-700 text-white font-bold py-1.5 px-4 rounded-full transition duration-200 shadow-sm text-xs uppercase tracking-wider">
                                            Kelola Status
                                        </a>
                                        
                                        @if($pesanan_item->pembayaran && $pesanan_item->pembayaran->status === 'menunggu_konfirmasi')
                                            <a href="{{ route('pembayaran.show', $pesanan_item->pembayaran->id) }}" class="inline-block bg-teal-600 hover:bg-teal-700 text-white font-bold py-1.5 px-4 rounded-full transition duration-200 shadow-sm text-xs uppercase tracking-wider">
                                                Konfirmasi
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-sm text-gray-500 font-medium">
                                Belum ada data pesanan aktif.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>