<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Pesanan Laundry Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('pesanan.store') }}" method="POST" 
                      x-data="{ 
                          berat: 0, 
                          hargaPerKg: 0, 
                          get total() { return this.berat * this.hargaPerKg } 
                      }">
                    @csrf

                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Pelanggan</label>
                        <select name="user_id" id="user_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->phone }}</option>
                            @endforeach
                        </select>
                        @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="layanan_id" class="block text-sm font-medium text-gray-700">Jenis Layanan</label>
                        <select name="layanan_id" id="layanan_id" required 
                                x-on:change="hargaPerKg = $event.target.options[$event.target.selectedIndex].dataset.price"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="" data-price="0">-- Pilih Layanan --</option>
                            @foreach($layanan as $item)
                                <option value="{{ $item->id }}" data-price="{{ $item->harga }}">
                                    {{ $item->nama_layanan }} (Rp {{ number_format($item->harga, 0, ',', '.') }}/kg)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="berat_jumlah" class="block text-sm font-medium text-gray-700">Berat (Kg)</label>
                        <input type="number" name="berat_jumlah" id="berat_jumlah" step="0.1" min="0.1" required 
                               x-model="berat"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="mb-6 p-4 bg-blue-50 rounded-md border border-blue-200">
                        <p class="text-sm text-blue-700 font-semibold">Estimasi Total Biaya:</p>
                        <p class="text-2xl font-bold text-blue-900">
                            Rp <span x-text="new Intl.NumberFormat('id-ID').format(total)">0</span>
                        </p>
                        <input type="hidden" name="total_harga" x-bind:value="total">
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Pesanan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>