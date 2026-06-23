<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pesanan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ search: '', statusFilter: 'all' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                    <div class="w-full md:w-1/3">
                        <input type="text" x-model="search" placeholder="Cari ID Pesanan..." 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div class="w-full md:w-1/4">
                        <select x-model="statusFilter" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="all">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="proses">Sedang Diproses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">ID Pesanan</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Tanggal</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Layanan</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Total Biaya</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($histories as $history)
                            <tr class="hover:bg-gray-50 transition duration-150"
                                x-show="(statusFilter === 'all' || statusFilter === '{{ strtolower($history->status_pesanan) }}') && 
                                        ('ORD-{{ $history->id }}'.toLowerCase().includes(search.toLowerCase()))">
                                
                                <td class="py-2 px-4 border-b text-sm font-medium text-gray-900">#ORD-{{ $history->id }}</td>
                                <td class="py-2 px-4 border-b text-sm text-gray-600">{{ $history->created_at }}</td>
                                <td class="py-2 px-4 border-b text-sm">{{ $history->layanan->nama_layanan }} ({{ $history->berat_jumlah }} Kg)</td>
                                <td class="py-2 px-4 border-b text-sm">Rp {{ number_format($history->total_harga, 0, ',', '.') }}</td>
                                <td class="py-2 px-4 border-b text-sm">
                                    <span class="px-2 py-1 rounded-full text-xs font-bold uppercase 
                                        {{ $history->status_pesanan == 'diambil' ? 'bg-green-200 text-green-800' : 
                                          ($history->status_pesanan == 'selesai' ? 'bg-teal-200 text-teal-800' : 
                                            ($history->status_pesanan == 'proses' || $history->status_pesanan == 'diproses' ? 'bg-blue-200 text-blue-800' : 
                                              ($history->status_pesanan == 'dibatalkan' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800'))) }}">
                                        {{ $history->status_pesanan }}
                                    </span>
                                </td>
                                <td class="py-2 px-4 border-b text-sm flex gap-2">
                                    <a href="{{ route('pembayaran.show', $history->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold underline">Lihat Nota</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>