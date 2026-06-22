<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pengecekan;
use Illuminate\Http\Request;

class PengecekanController extends Controller
{
    public function index()
    {
        $pengecekan = Pengecekan::with(['pesanan.user', 'pesanan.layanan'])->latest()->get();

        return response()->json([
            'message' => 'Data pengecekan berhasil diambil.',
            'data' => $pengecekan,
        ]);
    }

    public function create(Pesanan $pesanan)
    {
        $pesanan->load(['user', 'layanan', 'pengecekan']);

        return response()->json([
            'message' => 'Data pesanan untuk pengecekan berhasil diambil.',
            'data' => $pesanan,
        ]);
    }

    public function store(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'hasil_cek' => 'required|string',
            'catatan_kerusakan' => 'nullable|string',
        ]);

        $pengecekan = Pengecekan::create([
            'pesanan_id' => $pesanan->id,
            'hasil_cek' => $request->hasil_cek,
            'catatan_kerusakan' => $request->catatan_kerusakan,
        ]);

        return response()->json([
            'message' => 'Hasil pengecekan berhasil dicatat.',
            'data' => $pengecekan,
        ], 201);
    }
}
