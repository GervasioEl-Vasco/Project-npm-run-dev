<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Nota Pesanan') }}
            </h2>
            <button onclick="window.print()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2 shadow-sm">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 16H0V6h20v10h-4v4H4v-4zm2-4v6h8v-6H6zM4 0h12v5H4V0zM2 8v2h2V8H2zm4 0v2h2V8H6z"/></svg>
                Cetak Struk
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto bg-white shadow-lg p-8 border-t-8 border-indigo-600" id="printable-area">
            
            <div class="text-center border-b-2 border-dashed border-gray-300 pb-6 mb-6">
                <h1 class="text-3xl font-black text-gray-800 uppercase tracking-wider">PING! LAUNDRY</h1>
                <p class="text-gray-500 text-sm mt-1">Layanan Cepat, Pakaian Bersih, Hati Tenang</p>
                <p class="text-gray-500 text-xs mt-1">Jl. Contoh Alamat No. 123, Purbalingga</p>
            </div>

            <div class="flex justify-between text-sm text-gray-600 mb-6">
                <div>
                    <p><span class="font-bold text-gray-800">No. Nota:</span> #ORD-{{ $payment->pesanan->id }}</p>
                    <p><span class="font-bold text-gray-800">Tanggal:</span> {{ $payment->created_at }}</p>
                </div>
                <div class="text-right">
                    <p><span class="font-bold text-gray-800">Pelanggan:</span> {{ $payment->pesanan->user->name }}</p>
                    <p><span class="font-bold text-gray-800">Kasir:</span> Admin</p>
                </div>
            </div>

            <table class="w-full text-sm mb-6">
                <thead class="border-b border-gray-300">
                    <tr>
                        <th class="text-left py-2 text-gray-800">Layanan</th>
                        <th class="text-center py-2 text-gray-800">Berat</th>
                        <th class="text-right py-2 text-gray-800">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-100">
                        <td class="py-3 text-gray-600">{{ $payment->pesanan->layanan->nama_layanan }}</td>
                        <td class="text-center py-3 text-gray-600">{{ $payment->pesanan->berat_jumlah }} Kg</td>
                        <td class="text-right py-3 text-gray-800 font-medium">Rp {{ number_format($payment->pesanan->total_harga, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex flex-col items-end text-sm">
                <div class="flex justify-between w-1/2 mb-1">
                    <span class="text-gray-600">Total Tagihan:</span>
                    <span class="font-bold text-gray-800">Rp {{ number_format($payment->pesanan->total_harga, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between w-1/2 mb-1">
                    <span class="text-gray-600">Uang Tunai:</span>
                    <span class="text-gray-800">Rp {{ number_format($payment->nominal, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between w-1/2 border-t border-gray-300 pt-1 mt-1">
                    <span class="font-bold text-gray-800">Kembalian:</span>
                    <span class="font-bold text-indigo-600">Rp {{ number_format($payment->nominal - $payment->pesanan->total_harga, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="text-center mt-8 pt-6 border-t-2 border-dashed border-gray-300 text-sm text-gray-500">
                <p>Terima kasih telah mempercayakan cucian Anda!</p>
                <p>Status Cucian: <span class="font-bold text-gray-800 uppercase">{{ $payment->pesanan->status_pesanan }}</span></p>
            </div>
            
        </div>
    </div>

    <style>
        @media print {
            body * { visibility: hidden; }
            #printable-area, #printable-area * { visibility: visible; }
            #printable-area { position: absolute; left: 0; top: 0; width: 100%; border: none; box-shadow: none; }
        }
    </style>
</x-app-layout>