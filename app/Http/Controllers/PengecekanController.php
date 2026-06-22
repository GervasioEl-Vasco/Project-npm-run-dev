<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pengecekan;
use Illuminate\Http\Request;

class PengecekanController extends Controller
{
    public function store(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'hasil_cek' => 'required|string',
            'catatan_kerusakan' => 'nullable|string',
        ]);

        Pengecekan::create([
            'pesanan_id' => $pesanan->id,
            'hasil_cek' => $request->hasil_cek,
            'catatan_kerusakan' => $request->catatan_kerusakan,
        ]);

        return back()->with('success', 'Hasil pengecekan berhasil dicatat.');
    }
}
