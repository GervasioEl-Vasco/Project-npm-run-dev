<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        $pesanan = Pesanan::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->with(['layanan', 'user'])
            ->get();
        $totalRevenue = $pesanan->where('status_pembayaran', 'sudah_bayar')->sum('total_harga');
        $totalOrders = $pesanan->count();
        $completedOrders = $pesanan->where('status_pesanan', 'selesai')->count();

        // Menghitung omzet mingguan untuk chart
        $chartLabels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4', 'Minggu 5'];
        $chartValues = [0, 0, 0, 0, 0];

        foreach ($pesanan as $p) {
            if ($p->status_pembayaran === 'sudah_bayar') {
                $day = $p->created_at ? $p->created_at->day : 1;
                if ($day <= 7) {
                    $chartValues[0] += $p->total_harga;
                } elseif ($day <= 14) {
                    $chartValues[1] += $p->total_harga;
                } elseif ($day <= 21) {
                    $chartValues[2] += $p->total_harga;
                } elseif ($day <= 28) {
                    $chartValues[3] += $p->total_harga;
                } else {
                    $chartValues[4] += $p->total_harga;
                }
            }
        }

        return view('laporan.index', compact(
            'bulan',
            'tahun',
            'totalRevenue',
            'totalOrders',
            'completedOrders',
            'chartLabels',
            'chartValues'
        ));
    }
}
