<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pengecekan Fisik Cucian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Antrean Checking</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">ID Pesanan</th>
                                <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Pelanggan</th>
                                <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Layanan</th>
                                <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Status Pesanan</th>
                                <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Hasil Pengecekan</th>
                                <th class="py-3 px-4 border-b text-center text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesanan as $item)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="py-3 px-4 border-b text-sm font-bold text-gray-900">#ORD-{{ $item->id }}</td>
                                <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $item->user->name }}</td>
                                <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $item->layanan->nama_layanan }}</td>
                                <td class="py-3 px-4 border-b text-sm">
                                    <span class="px-2.5 py-1 text-xs font-bold uppercase rounded-full 
                                        {{ $item->status_pesanan == 'menunggu' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $item->status_pesanan }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 border-b text-sm text-gray-600">
                                    @if($item->pengecekan->isNotEmpty())
                                        <span class="text-green-600 font-semibold">✓ Checked: {{ $item->pengecekan->first()->hasil_cek }}</span>
                                    @else
                                        <span class="text-red-500 font-semibold">⏳ Belum Dicek</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 border-b text-sm text-center">
                                    @if($item->pengecekan->isEmpty())
                                        <a href="{{ route('pengecekan.create', $item->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-1.5 px-4 rounded text-xs transition shadow-sm">
                                            Lakukan Checking
                                        </a>
                                    @else
                                        <span class="text-gray-400 text-xs">Selesai diperiksa</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-400">Belum ada data pesanan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
