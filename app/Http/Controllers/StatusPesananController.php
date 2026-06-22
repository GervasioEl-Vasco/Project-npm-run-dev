<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusUpdated;
use App\Models\Pesanan;
use App\Models\LogStatus;
use Illuminate\Http\Request;

class StatusPesananController extends Controller
{
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'status_pesanan' => 'required|in:menunggu,diproses,selesai,diambil,dibatalkan',
            'keterangan' => 'nullable|string'
        ]);

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

        OrderStatusUpdated::dispatch(
            $pesanan,
            $status_lama,
            $request->status_pesanan,
            $request->keterangan ?? 'Status diubah oleh admin',
        );

        return response()->json([
            'message' => 'Status pesanan berhasil diperbarui.',
            'data' => $pesanan->fresh(['user', 'layanan', 'logStatus']),
        ]);
    }
}
