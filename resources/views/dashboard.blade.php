<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-medium text-teal-700">Dashboard</p>
                <h1 class="text-2xl font-bold text-slate-950">
                    {{ Auth::user()?->role === 'admin' ? 'Operasional Laundry' : 'Ringkasan Pesanan' }}
                </h1>
            </div>

            <x-button size="sm">
                {{ Auth::user()?->role === 'admin' ? 'Lihat Laporan' : 'Buat Pesanan' }}
            </x-button>
        </div>
    </x-slot>

    @php
        $isAdmin = Auth::user()?->role === 'admin';

        $stats = $isAdmin
            ? [
                ['label' => 'Pesanan Aktif', 'value' => '24'],
                ['label' => 'Menunggu Checking', 'value' => '8'],
                ['label' => 'Pendapatan Hari Ini', 'value' => 'Rp 1,2 jt'],
            ]
            : [
                ['label' => 'Pesanan Berjalan', 'value' => '2'],
                ['label' => 'Siap Diambil', 'value' => '1'],
                ['label' => 'Total Transaksi', 'value' => 'Rp 185 rb'],
            ];
    @endphp

    <div class="space-y-6">
        <div class="grid gap-4 md:grid-cols-3">
            @foreach ($stats as $stat)
                <x-card padding="p-5">
                    <p class="text-sm font-medium text-slate-500">{{ $stat['label'] }}</p>
                    <p class="mt-2 text-2xl font-bold text-slate-950">{{ $stat['value'] }}</p>
                </x-card>
            @endforeach
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.4fr_1fr]">
            <x-card>
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-base font-semibold text-slate-950">
                            {{ $isAdmin ? 'Antrian Pesanan' : 'Status Terbaru' }}
                        </h2>
                        <p class="mt-1 text-sm text-slate-500">
                            {{ $isAdmin ? 'Pantau status pekerjaan dari masuk sampai selesai.' : 'Pantau progres laundry yang sedang berjalan.' }}
                        </p>
                    </div>
                </div>

                <div class="mt-6 space-y-3">
                    @foreach (['Diterima', 'Dicuci', 'Disetrika', 'Siap Diambil'] as $index => $status)
                        <div class="flex items-center gap-4 rounded-lg border border-slate-200 p-4">
                            <div @class([
                                'flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-sm font-semibold',
                                'bg-teal-600 text-white' => $index === 0,
                                'bg-slate-100 text-slate-500' => $index !== 0,
                            ])>
                                {{ $index + 1 }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="font-medium text-slate-900">{{ $status }}</p>
                                <p class="text-sm text-slate-500">Order #LDY-00{{ $index + 1 }}</p>
                            </div>
                            <span class="rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-700">
                                Aktif
                            </span>
                        </div>
                    @endforeach
                </div>
            </x-card>

            <x-card>
                <h2 class="text-base font-semibold text-slate-950">
                    {{ $isAdmin ? 'Prioritas Hari Ini' : 'Aksi Cepat' }}
                </h2>

                <div class="mt-5 space-y-3">
                    <x-alert variant="info" title="{{ $isAdmin ? 'Cek order baru' : 'Ambil pesanan' }}">
                        {{ $isAdmin ? 'Pastikan pesanan masuk sudah melalui tahap checking.' : 'Pesanan yang sudah selesai dapat diambil di outlet.' }}
                    </x-alert>

                    <x-alert variant="success" title="{{ $isAdmin ? 'Laporan siap' : 'Pembayaran aman' }}">
                        {{ $isAdmin ? 'Ringkasan transaksi harian siap ditinjau.' : 'Simpan bukti pembayaran untuk verifikasi.' }}
                    </x-alert>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
