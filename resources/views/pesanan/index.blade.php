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
                                <td class="py-2 px-4 border-b text-sm">
                                    <div class="flex flex-col gap-2">
                                        @if(auth()->user()->role === 'customer')
                                            @if($pesanan_item->status_pembayaran === 'belum_bayar')
                                                @if($pesanan_item->pembayaran && $pesanan_item->pembayaran->status === 'menunggu_konfirmasi')
                                                    <span class="text-gray-500 italic text-xs">Menunggu Konfirmasi Bayar</span>
                                                @else
                                                    <a href="{{ route('pembayaran.create', $pesanan_item->id) }}" class="text-blue-600 hover:text-blue-900 underline text-xs">Bayar Tagihan</a>
                                                @endif
                                            @else
                                                <span class="text-green-600 font-bold text-xs">Lunas</span>
                                            @endif
                                        @else
                                            <a href="{{ route('status.edit', $pesanan_item->id) }}" class="text-indigo-600 hover:text-indigo-900 underline text-xs">Kelola Status</a>
                                            
                                            @if($pesanan_item->pembayaran && $pesanan_item->pembayaran->status === 'menunggu_konfirmasi')
                                                <a href="{{ route('pembayaran.show', $pesanan_item->pembayaran->id) }}" class="text-green-600 hover:text-green-900 underline text-xs">Konfirmasi Bayar</a>
                                            @endif
                                        @endif
                                    </div>
                                </td>
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