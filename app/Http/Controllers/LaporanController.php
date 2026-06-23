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

        $total_pendapatan = $pesanan->where('status_pembayaran', 'sudah_bayar')->sum('total_harga');

        return view('laporan.index', compact('pesanan', 'total_pendapatan', 'bulan', 'tahun'));
    }
}
