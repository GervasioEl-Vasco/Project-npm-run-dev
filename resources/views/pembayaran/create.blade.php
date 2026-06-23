<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proses Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6 pb-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold">Detail Pesanan #ORD-{{ $pesanan->id }}</h3>
                    <p class="text-gray-600">Pelanggan: {{ $pesanan->user->name }}</p>
                    <p class="text-gray-600">Layanan: {{ $pesanan->layanan->nama_layanan }} ({{ $pesanan->berat_jumlah }} Kg)</p>
                </div>

                <form action="{{ route('pembayaran.store', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Total Tagihan</label>
                        <div class="mt-1 text-2xl font-bold text-red-600">
                            Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                        <select name="metode_pembayaran" id="metode_pembayaran" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="transfer_bank">Transfer Bank</option>
                            <option value="ewallet">E-Wallet (OVO/Dana/Gopay)</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="bukti_bayar" class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti_bayar" id="bukti_bayar" required accept="image/*"
                               class="mt-1 block w-full text-sm text-gray-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-md file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-indigo-50 file:text-indigo-700
                                      hover:file:bg-indigo-100">
                        @error('bukti_bayar')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('pesanan.index') }}" class="text-gray-500 mr-4 hover:underline">Batal</a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Kirim Bukti Pembayaran
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>