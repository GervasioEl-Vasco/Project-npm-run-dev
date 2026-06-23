<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Status Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6 pb-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold">Detail Pesanan #ORD-{{ $pesanan->id }}</h3>
                    <p class="text-gray-600">Pelanggan: {{ $pesanan->user->name }}</p>
                    <p class="text-gray-600">Layanan: {{ $pesanan->layanan->nama_layanan }} ({{ $pesanan->berat_jumlah }} Kg)</p>
                    <p class="text-gray-600">Status Saat Ini: <span class="font-bold text-indigo-600 uppercase">{{ $pesanan->status_pesanan }}</span></p>
                </div>

                <form action="{{ route('status.update', $pesanan->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="status_pesanan" class="block text-sm font-medium text-gray-700">Update Status Cucian</label>
                        <select name="status_pesanan" id="status_pesanan" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="menunggu" {{ $pesanan->status_pesanan == 'menunggu' ? 'selected' : '' }}>Menunggu (Belum Dicuci)</option>
                            <option value="diproses" {{ $pesanan->status_pesanan == 'diproses' ? 'selected' : '' }}>Diproses (Sedang Dicuci/Disetrika)</option>
                            <option value="selesai" {{ $pesanan->status_pesanan == 'selesai' ? 'selected' : '' }}>Selesai (Siap Diambil)</option>
                            <option value="diambil" {{ $pesanan->status_pesanan == 'diambil' ? 'selected' : '' }}>Diambil (Sudah Diserahkan)</option>
                            <option value="dibatalkan" {{ $pesanan->status_pesanan == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700">Catatan Tambahan (Opsional)</label>
                        <textarea name="keterangan" id="keterangan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Baju luntur, harap diambil segera..."></textarea>
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('pesanan.index') }}" class="text-gray-500 mr-4 hover:underline">Batal</a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Perubahan Status
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
