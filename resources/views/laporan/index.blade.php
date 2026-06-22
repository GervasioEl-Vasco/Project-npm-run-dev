<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Keuangan & Operasional') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Cards Ringkasan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-6 rounded-2xl text-white shadow-lg">
                    <span class="text-xs uppercase font-extrabold tracking-widest opacity-75">Total Omzet Bulan Ini</span>
                    <h3 class="text-3xl font-black mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <span class="text-xs uppercase font-extrabold tracking-widest text-gray-400 block">Total Pesanan</span>
                    <h3 class="text-3xl font-black text-gray-800 mt-2">{{ $totalOrders }} Order</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <span class="text-xs uppercase font-extrabold tracking-widest text-gray-400 block">Status Selesai</span>
                    <h3 class="text-3xl font-black text-green-600 mt-2">{{ $completedOrders }} Order</h3>
                </div>
            </div>

            <!-- Grafik Omzet -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Transaksi Mingguan</h3>
                <div class="h-64">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <!-- ChartJS Script Integration -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartLabels) !!},
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: {!! json_encode($chartValues) !!},
                        borderColor: '#4f46e5',
                        backgroundColor: 'rgba(79, 70, 229, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
