<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pesanan Laundry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Data Pesanan Aktif</h3>
                    <a href="{{ route('pesanan.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        + Pesanan Baru
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">ID</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Pelanggan</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Layanan</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Berat</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Total Biaya</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesanan as $pesanan_item)
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4 border-b text-sm">#ORD-{{ $pesanan_item->id }}</td>
                                <td class="py-2 px-4 border-b text-sm">{{ $pesanan_item->user->name }}</td>
                                <td class="py-2 px-4 border-b text-sm">{{ $pesanan_item->layanan->nama_layanan }}</td>
                                <td class="py-2 px-4 border-b text-sm">{{ $pesanan_item->berat_jumlah }} Kg</td>
                                <td class="py-2 px-4 border-b text-sm">Rp {{ number_format($pesanan_item->total_harga, 0, ',', '.') }}</td>
                                <td class="py-2 px-4 border-b text-sm">
                                    <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded-full text-xs font-bold uppercase">
                                        {{ $pesanan_item->status_pesanan }}
                                    </span>
                                </td>
                                <td class="py-2 px-4 border-b text-sm flex gap-2">
                                    <a href="{{ route('pembayaran.create', $pesanan_item->id) }}" class="text-blue-600 hover:text-blue-900 underline">Bayar</a>
                                    </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="py-4 text-center text-gray-500">Belum ada data pesanan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>