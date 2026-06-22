<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('pesanan')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function store(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string',
            'bukti_bayar' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('bukti_bayar')) {
            $path = $request->file('bukti_bayar')->store('bukti_bayar', 'public');
        }

        Pembayaran::create([
            'pesanan_id' => $pesanan->id,
            'nominal' => $pesanan->total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_bayar' => $path,
            'status' => 'menunggu_konfirmasi',
        ]);

        return back()->with('success', 'Pembayaran berhasil dikirim dan menunggu konfirmasi.');
    }

    public function konfirmasi(Pembayaran $pembayaran)
    {
        $pembayaran->update(['status' => 'berhasil']);
        $pembayaran->pesanan->update(['status_pembayaran' => 'sudah_bayar']);

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}
