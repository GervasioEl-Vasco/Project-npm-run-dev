<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\LogStatus;
use Illuminate\Http\Request;

class StatusPesananController extends Controller
{
    public function edit(Pesanan $pesanan)
    {
        return view('status.edit', compact('pesanan'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'status_pesanan' => 'required|in:menunggu,diproses,selesai,dibatalkan',
            'keterangan' => 'nullable|string'
        ]);

        if ($pesanan->status_pesanan === 'selesai') {
            return back()->with('error', 'Pesanan ini sudah tutup buku dan statusnya tidak dapat diubah lagi.');
        }

        if ($request->status_pesanan === 'selesai' && $pesanan->status_pembayaran !== 'sudah_bayar') {
            return back()->with('error', 'Pesanan tidak dapat diselesaikan karena pembayaran belum lunas atau belum dikonfirmasi.');
        }

        $status_lama = $pesanan->status_pesanan;
        $pesanan->update([
            'status_pesanan' => $request->status_pesanan
        ]);

        LogStatus::create([
            'pesanan_id' => $pesanan->id,
            'status_sebelumnya' => $status_lama,
            'status_baru' => $request->status_pesanan,
            'keterangan' => $request->keterangan ?? 'Status diubah oleh admin',
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
