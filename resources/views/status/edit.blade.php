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

                @if($pesanan->status_pesanan === 'selesai')
                    <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 text-center">
                        <svg class="w-12 h-12 text-green-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h4 class="font-bold text-lg">Pesanan Telah Selesai</h4>
                        <p class="text-sm mt-1">Transaksi untuk pesanan ini sudah tutup buku dan tidak dapat diubah lagi.</p>
                        <div class="mt-4">
                            <a href="{{ route('pesanan.index') }}" class="text-indigo-600 font-semibold hover:underline">&larr; Kembali ke Daftar Pesanan</a>
                        </div>
                    </div>
                @else
                    <form action="{{ route('status.update', $pesanan->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="status_pesanan" class="block text-sm font-medium text-gray-700">Update Status Cucian</label>
                            <select name="status_pesanan" id="status_pesanan" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="menunggu" {{ $pesanan->status_pesanan == 'menunggu' ? 'selected' : '' }}>Menunggu (Belum Dicuci)</option>
                                <option value="diproses" {{ $pesanan->status_pesanan == 'diproses' ? 'selected' : '' }}>Diproses (Sedang Dicuci/Disetrika)</option>
                                <option value="selesai" 
                                    {{ $pesanan->status_pesanan == 'selesai' ? 'selected' : '' }}
                                    {{ $pesanan->status_pembayaran !== 'sudah_bayar' ? 'disabled' : '' }}>
                                    Selesai (Sudah Selesai & Diambil)
                                </option>
                                <option value="dibatalkan" {{ $pesanan->status_pesanan == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            @if($pesanan->status_pembayaran !== 'sudah_bayar')
                                <p class="text-xs text-red-500 mt-2 font-semibold">
                                    * Status "Selesai" dikunci. Pelanggan harus membayar dan mengirimkan bukti pembayaran terlebih dahulu.
                                </p>
                            @endif
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
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
