<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Layanan;
use App\Models\LogStatus;
use App\Services\CostCalculationService;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with(['user', 'layanan'])->get();

        return response()->json([
            'message' => 'Data pesanan berhasil diambil.',
            'data' => $pesanan,
        ]);
    }

    public function create()
    {
        $layanan = Layanan::where('status_tersedia', true)->get();

        return response()->json([
            'message' => 'Data layanan tersedia untuk membuat pesanan berhasil diambil.',
            'data' => $layanan,
        ]);
    }

    public function store(Request $request, CostCalculationService $costCalculationService)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanan,id',
            'berat_jumlah' => 'required|integer|min:1',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);
        $total_harga = $costCalculationService->hitungTotal($layanan, (int) $request->berat_jumlah);

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

        return response()->json([
            'message' => 'Pesanan berhasil dibuat.',
            'data' => $pesanan->load(['user', 'layanan']),
        ], 201);
    }

    public function show(Pesanan $pesanan)
    {
        $pesanan->load(['user', 'layanan', 'logStatus', 'pembayaran', 'pengecekan']);

        return response()->json([
            'message' => 'Detail pesanan berhasil diambil.',
            'data' => $pesanan,
        ]);
    }
}
