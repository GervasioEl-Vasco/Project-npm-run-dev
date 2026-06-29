<x-app-layout>
    <div class="space-y-6">
        <!-- Judul halaman -->
        <h2 class="text-2xl font-bold text-gray-900">Input Pesanan Laundry Baru</h2>

        <!-- Form Card Container -->
        <div class="bg-white rounded-[2rem] shadow-xl border border-pink-100/50 p-8 max-w-5xl">
            <form action="{{ route('pesanan.store') }}" method="POST" 
                  x-data="{ 
                      berat: 0, 
                      hargaPerKg: 0, 
                      get total() { return this.berat * this.hargaPerKg } 
                  }">
                @csrf

                @if(auth()->user()->role === 'customer')
                    <!-- Data Pelanggan (Untuk Customer) -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-900 mb-2 ml-1">Data Pelanggan</label>
                        <input type="text" disabled value="{{ auth()->user()->name }} ({{ auth()->user()->phone }})" 
                               class="block w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-600 cursor-not-allowed shadow-sm text-sm">
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    </div>
                @else
                    <!-- Pilih Pelanggan (Untuk Admin/Staff) -->
                    <div class="mb-6">
                        <label for="user_id" class="block text-sm font-bold text-gray-900 mb-2 ml-1">Pilih Pelanggan</label>
                        <select name="user_id" id="user_id" required 
                                class="block w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm">
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} - {{ $user->phone }}</option>
                            @endforeach
                        </select>
                        @error('user_id') <span class="text-red-500 text-sm ml-4 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                @endif

                <!-- Jenis Layanan / Paket -->
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-900 mb-2 ml-1">Data Pelanggan</label>
                    <select name="layanan_id" id="layanan_id" required 
                            x-on:change="hargaPerKg = $event.target.options[$event.target.selectedIndex].dataset.price"
                            class="block w-full px-5 py-3 rounded-xl border border-gray-300 bg-gray-100 text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm">
                        <option value="" data-price="0">--Pilih Layanan--</option>
                        @foreach($layanan as $item)
                            <option value="{{ $item->id }}" data-price="{{ $item->harga }}">
                                {{ $item->nama_layanan }} (Rp {{ number_format($item->harga, 0, ',', '.') }}/kg)
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Berat (Kg) -->
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-900 mb-2 ml-1">Data Pelanggan</label>
                    <input type="number" name="berat_jumlah" id="berat_jumlah" step="0.1" min="0.1" required 
                           x-model="berat"
                           placeholder="0 (Kg)"
                           class="block w-full px-5 py-3 rounded-full border border-gray-300 bg-white text-gray-800 shadow-sm focus:ring-2 focus:ring-pink-500/50 text-sm">
                </div>

                <!-- Estimasi Total Biaya Box -->
                <div class="mb-6 p-6 bg-pink-100/70 rounded-2xl border border-pink-200/50">
                    <p class="text-sm text-[#ba2b65] font-bold">Etimasi Total Biaya</p>
                    <p class="text-3xl font-black text-[#ba2b65] mt-1">
                        Rp <span x-text="new Intl.NumberFormat('id-ID').format(total)">0</span>
                    </p>
                    <input type="hidden" name="total_harga" x-bind:value="total">
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-[#e8a3c0] hover:bg-[#e49bb7] text-[#ba2b65] font-extrabold py-3 px-8 rounded-full shadow-md transition duration-200 text-sm">
                        Simpanan Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>