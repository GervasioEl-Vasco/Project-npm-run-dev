<x-app-layout>
    <div class="space-y-6" x-data="{ search: '', statusFilter: 'all' }">
        <!-- Judul Halaman -->
        <h2 class="text-2xl font-bold text-gray-900">Riwayat Pesanan Anda</h2>

        <!-- Card Container -->
        <div class="bg-white rounded-[2rem] shadow-xl border border-pink-100/50 p-8">
            
            <!-- Filters Section -->
            <div class="flex flex-col sm:flex-row justify-between gap-6 mb-8">
                <!-- Search Input -->
                <div class="w-full sm:w-1/3">
                    <input type="text" x-model="search" placeholder="Data Pelanggan" 
                           class="w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm">
                </div>
                <!-- Status Filter Dropdown -->
                <div class="w-full sm:w-1/3">
                    <select x-model="statusFilter" 
                            class="w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-500 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm">
                        <option value="all">Data Pelanggan (Semua Status)</option>
                        <option value="pending">Pending</option>
                        <option value="proses">Sedang Diproses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto rounded-[2rem] border border-gray-300 shadow-sm">
                <table class="min-w-full bg-white divide-y divide-gray-300">
                    <thead class="bg-[#e8a3c0]/60">
                        <tr>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">ID Pesanan</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Tanggal</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Layanan</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Total Biaya</th>
                            <th class="py-4 px-6 border-r border-gray-300 text-center text-sm font-extrabold text-gray-900">Status</th>
                            <th class="py-4 px-6 text-center text-sm font-extrabold text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($histories as $history)
                        <tr class="hover:bg-pink-50/20 transition duration-150"
                            x-show="(statusFilter === 'all' || statusFilter === '{{ strtolower($history->status_pesanan) }}') && 
                                    ('ORD-{{ $history->id }}'.toLowerCase().includes(search.toLowerCase()) || '{{ strtolower($history->layanan->nama_layanan) }}'.includes(search.toLowerCase()))">
                            
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm font-bold text-gray-900">#ORD-{{ $history->id }}</td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm text-gray-600">
                                {{ $history->created_at ? $history->created_at->format('d M Y') : '-' }}
                            </td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm text-gray-800">
                                {{ $history->layanan->nama_layanan }} ({{ $history->berat_jumlah }} Kg)
                            </td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm font-semibold text-gray-800">
                                Rp {{ number_format($history->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 border-r border-gray-300 text-center text-sm">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                                    {{ $history->status_pesanan == 'diambil' ? 'bg-green-100 text-green-700 border border-green-200' : 
                                      ($history->status_pesanan == 'selesai' ? 'bg-teal-100 text-teal-700 border border-teal-200' : 
                                        ($history->status_pesanan == 'proses' || $history->status_pesanan == 'diproses' ? 'bg-blue-100 text-blue-700 border border-blue-200' : 
                                          ($history->status_pesanan == 'dibatalkan' ? 'bg-red-100 text-red-700 border border-red-200' : 'bg-yellow-100 text-yellow-700 border border-yellow-200'))) }}">
                                    {{ $history->status_pesanan }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center text-sm">
                                <a href="{{ route('pembayaran.show', $history->id) }}" class="inline-block bg-[#d94f87] hover:bg-pink-700 text-white font-bold py-1.5 px-4 rounded-full transition duration-200 shadow-sm text-xs uppercase tracking-wider">
                                    Lihat Nota
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                        @if($histories->isEmpty())
                        <tr>
                            <td colspan="6" class="py-8 text-center text-sm text-gray-500 font-medium">
                                Belum ada riwayat pesanan.
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>