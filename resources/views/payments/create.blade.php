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
                    <h3 class="text-lg font-bold">Detail Pesanan #ORD-{{ $order->id }}</h3>
                    <p class="text-gray-600">Pelanggan: {{ $order->user->name }}</p>
                    <p class="text-gray-600">Layanan: {{ $order->service->name }} ({{ $order->weight }} Kg)</p>
                </div>

                <form action="{{ route('payments.store') }}" method="POST"
                      x-data="{ 
                          totalTagihan: {{ $order->total_price }},
                          jumlahBayar: 0,
                          get kembalian() { return this.jumlahBayar - this.totalTagihan }
                      }">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Total Tagihan</label>
                        <div class="mt-1 text-2xl font-bold text-red-600">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Uang Diterima (Rp)</label>
                        <input type="number" name="amount" id="amount" required min="{{ $order->total_price }}"
                               x-model.number="jumlahBayar"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg font-bold">
                    </div>

                    <div class="mb-6 p-4 rounded-md" 
                         x-bind:class="kembalian >= 0 ? 'bg-green-50 border border-green-200' : 'bg-red-50 border border-red-200'">
                        <p class="text-sm font-semibold" 
                           x-bind:class="kembalian >= 0 ? 'text-green-700' : 'text-red-700'">
                            Kembalian:
                        </p>
                        <p class="text-2xl font-bold" 
                           x-bind:class="kembalian >= 0 ? 'text-green-900' : 'text-red-900'">
                            Rp <span x-text="kembalian >= 0 ? new Intl.NumberFormat('id-ID').format(kembalian) : '0'">0</span>
                        </p>
                        <p x-show="kembalian < 0 && jumlahBayar > 0" class="text-xs text-red-500 mt-1">
                            *Uang pembayaran belum mencukupi.
                        </p>
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('orders.index') }}" class="text-gray-500 mr-4 hover:underline">Batal</a>
                        <button type="submit" x-bind:disabled="kembalian < 0" 
                                class="bg-indigo-600 hover:bg-indigo-700 disabled:bg-gray-400 text-white font-bold py-2 px-4 rounded">
                            Konfirmasi Pembayaran
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>