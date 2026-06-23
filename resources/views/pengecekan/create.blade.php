<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proses Checking Cucian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 border border-gray-100"
                 x-data="{ 
                     sakuKosong: false, 
                     lunturAman: false, 
                     kancingLengkap: false, 
                     adaTemuan: false, 
                     catatanTemuan: '',
                     get canSubmit() { return this.sakuKosong && this.lunturAman && this.kancingLengkap }
                 }">
                
                <h3 class="text-xl font-bold text-gray-800 mb-6 pb-2 border-b">
                    Form Pengecekan Fisik: #ORD-{{ $pesanan->id }}
                </h3>

                <form action="{{ route('pengecekan.store', $pesanan->id) }}" method="POST">
                    @csrf

                    <!-- Input tersembunyi agar lolos validasi hasil_cek di controller -->
                    <input type="hidden" name="hasil_cek" value="Lolos Pengecekan Fisik">

                    <!-- Checklist Box -->
                    <div class="space-y-4 mb-6">
                        <label class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg cursor-pointer hover:bg-gray-100 transition">
                            <input type="checkbox" x-model="sakuKosong" class="rounded text-indigo-600 focus:ring-indigo-500 w-5 h-5">
                            <span class="text-sm font-semibold text-gray-700">Semua saku pakaian sudah diperiksa & kosong</span>
                        </label>

                        <label class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg cursor-pointer hover:bg-gray-100 transition">
                            <input type="checkbox" x-model="lunturAman" class="rounded text-indigo-600 focus:ring-indigo-500 w-5 h-5">
                            <span class="text-sm font-semibold text-gray-700">Pakaian disortir aman dari potensi luntur warna</span>
                        </label>

                        <label class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg cursor-pointer hover:bg-gray-100 transition">
                            <input type="checkbox" x-model="kancingLengkap" class="rounded text-indigo-600 focus:ring-indigo-500 w-5 h-5">
                            <span class="text-sm font-semibold text-gray-700">Kancing & resleting pakaian dalam kondisi aman</span>
                        </label>
                    </div>

                    <!-- Temuan Barang/Nota Tambahan -->
                    <div class="mb-6 p-4 rounded-xl border" :class="adaTemuan ? 'bg-yellow-50 border-yellow-200' : 'bg-gray-50 border-gray-200'">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-gray-700">Apakah ada barang tertinggal di saku / pakaian rusak?</span>
                            <button type="button" @click="adaTemuan = !adaTemuan" 
                                    class="px-4 py-1.5 rounded-full text-xs font-bold transition"
                                    :class="adaTemuan ? 'bg-yellow-600 text-white' : 'bg-gray-200 text-gray-700'">
                                <span x-text="adaTemuan ? 'Ada Catatan' : 'Tidak Ada'">Tidak Ada</span>
                            </button>
                        </div>
                        
                        <div x-show="adaTemuan" x-transition class="mt-4">
                            <label for="catatan_kerusakan" class="block text-xs font-bold text-gray-600 uppercase mb-1">Daftar Barang Temuan / Detail Kerusakan Fisik</label>
                            <textarea name="catatan_kerusakan" id="catatan_kerusakan" x-model="catatanTemuan" rows="3"
                                      class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" 
                                      placeholder="Tulis detail temuan atau bagian yang robek/cacat..."></textarea>
                        </div>
                    </div>

                    <div class="flex justify-between items-center border-t pt-4">
                        <a href="{{ route('pengecekan.index') }}" class="text-gray-500 hover:underline">Kembali</a>
                        <button type="submit" :disabled="!canSubmit" 
                                class="bg-indigo-600 hover:bg-indigo-700 disabled:bg-gray-300 disabled:cursor-not-allowed text-white font-bold py-2.5 px-6 rounded-xl transition duration-200 shadow-md">
                            Konfirmasi & Lanjutkan Cucian
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
