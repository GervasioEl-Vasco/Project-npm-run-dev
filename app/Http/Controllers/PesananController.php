<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Layanan;
use App\Models\LogStatus;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with(['user', 'layanan'])->get();
        return view('pesanan.index', compact('pesanan'));
    }

    public function create()
    {
        $layanan = Layanan::where('status_tersedia', true)->get();
        return view('pesanan.create', compact('layanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanan,id',
            'berat_jumlah' => 'required|integer|min:1',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);
        $total_harga = $layanan->harga * $request->berat_jumlah;

        $pesanan = Pesanan::create([
            'user_id' => auth()->id() ?? 1, // fallback untuk testing
            'layanan_id' => $layanan->id,
            'berat_jumlah' => $request->berat_jumlah,
            'total_harga' => $total_harga,
            'status_pesanan' => 'menunggu',
            'status_pembayaran' => 'belum_bayar',
            'catatan' => $request->catatan,
        ]);

        LogStatus::create([
            'pesanan_id' => $pesanan->id,
            'status_sebelumnya' => null,
            'status_baru' => 'menunggu',
            'keterangan' => 'Pesanan baru dibuat',
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function show(Pesanan $pesanan)
    {
        $pesanan->load(['user', 'layanan', 'logStatus', 'pembayaran', 'pengecekan']);
        return view('pesanan.show', compact('pesanan'));
    }
}
