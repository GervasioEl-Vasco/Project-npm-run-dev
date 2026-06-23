<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with(['layanan', 'pembayaran'])
            ->whereIn('status_pesanan', ['selesai', 'diambil', 'dibatalkan']);

        if ($request->user()->role !== 'admin') {
            $query->where('user_id', $request->user()->id);
        }

        $riwayat = $query->latest()->get();

        return view('history.index', compact('riwayat'));
    }

    public function show(Request $request, Pesanan $pesanan)
    {
        if ($request->user()->role !== 'admin' && $pesanan->user_id !== $request->user()->id) {
            abort(403, 'Anda tidak boleh melihat riwayat pesanan ini.');
        }

        $pesanan->load(['user', 'layanan', 'pembayaran', 'pengecekan', 'logStatus']);

        return view('history.show', compact('pesanan'));
    }
}
