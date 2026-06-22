<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Pesanan Laundry Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('orders.store') }}" method="POST" 
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
                                <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->phone_number }}</option>
                            @endforeach
                        </select>
                        @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="service_id" class="block text-sm font-medium text-gray-700">Jenis Layanan</label>
                        <select name="service_id" id="service_id" required 
                                x-on:change="hargaPerKg = $event.target.options[$event.target.selectedIndex].dataset.price"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="" data-price="0">-- Pilih Layanan --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" data-price="{{ $service->price_per_kg }}">
                                    {{ $service->name }} (Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}/kg)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="weight" class="block text-sm font-medium text-gray-700">Berat (Kg)</label>
                        <input type="number" name="weight" id="weight" step="0.1" min="0.1" required 
                               x-model="berat"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="mb-6 p-4 bg-blue-50 rounded-md border border-blue-200">
                        <p class="text-sm text-blue-700 font-semibold">Estimasi Total Biaya:</p>
                        <p class="text-2xl font-bold text-blue-900">
                            Rp <span x-text="new Intl.NumberFormat('id-ID').format(total)">0</span>
                        </p>
                        <input type="hidden" name="total_price" x-bind:value="total">
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