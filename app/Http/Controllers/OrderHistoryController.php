<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with(['layanan', 'pembayaran'])
            ->whereIn('status_pesanan', ['diambil', 'dibatalkan']);

        if (!in_array($request->user()->role, ['admin', 'staff'])) {
            $query->where('user_id', $request->user()->id);
        }

        $riwayat = $query->latest()->get();

        return view('history.index', ['histories' => $riwayat]);
    }

    public function show(Request $request, Pesanan $pesanan)
    {
        if (!in_array($request->user()->role, ['admin', 'staff']) && $pesanan->user_id !== $request->user()->id) {
            abort(403, 'Anda tidak boleh melihat riwayat pesanan ini.');
        }

        $pesanan->load(['user', 'layanan', 'pembayaran', 'pengecekan', 'logStatus']);

        if ($pesanan->pembayaran) {
            return redirect()->route('pembayaran.show', $pesanan->pembayaran->id);
            }
            abort(404, 'Nota pembayaran belum tersedia.');
    }
}
