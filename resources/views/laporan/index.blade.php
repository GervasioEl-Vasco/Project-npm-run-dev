<x-app-layout>
    <div class="space-y-6">
        <!-- Judul Halaman -->
        <h2 class="text-2xl font-bold text-gray-900">Laporan Keuangan dan Operasional</h2>

        <!-- Cards Ringkasan (Stats) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Total Omzet Bulan Ini -->
            <div class="bg-[#d94f87] p-8 rounded-[2rem] text-white shadow-xl flex flex-col justify-between h-40">
                <span class="text-sm font-bold opacity-90">Total Omzet Bulan ini</span>
                <h3 class="text-3xl font-black mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
            </div>
            <!-- Total Pesanan -->
            <div class="bg-white p-8 rounded-[2rem] border border-pink-100/50 shadow-lg flex flex-col justify-between h-40">
                <span class="text-sm font-bold text-gray-800">Total Pesanan</span>
                <h3 class="text-3xl font-black text-gray-900 mt-2">{{ $totalOrders }} Order</h3>
            </div>
            <!-- Status Selesai -->
            <div class="bg-white p-8 rounded-[2rem] border border-pink-100/50 shadow-lg flex flex-col justify-between h-40">
                <span class="text-sm font-bold text-gray-800">Status Selesai</span>
                <h3 class="text-3xl font-black text-gray-900 mt-2">{{ $completedOrders }} Order</h3>
            </div>
        </div>

        <!-- Grafik Omzet -->
        <div class="bg-white p-8 rounded-[2rem] border border-pink-100/50 shadow-xl">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Grafik Transaksi Mingguan</h3>
            <div class="h-80">
                <canvas id="revenueChart"></canvas>
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
                        borderColor: '#d94f87',
                        backgroundColor: 'rgba(217, 79, 135, 0.15)',
                        borderWidth: 4,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#d94f87',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
