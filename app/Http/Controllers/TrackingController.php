<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with(['layanan', 'logStatus' => fn ($query) => $query->latest()]);

        if ($request->user()->role !== 'admin') {
            $query->where('user_id', $request->user()->id);
        }

        $pesanan = $query->latest()->get();

        return view('pesanan.index', compact('pesanan'));
    }

    public function show(Request $request, Pesanan $pesanan)
    {
        if ($request->user()->role !== 'admin' && $pesanan->user_id !== $request->user()->id) {
            abort(403, 'Anda tidak boleh melihat tracking pesanan ini.');
        }

        $pesanan->load(['user', 'layanan', 'logStatus' => fn ($query) => $query->oldest()]);

        return view('tracking.show', compact('pesanan'));
    }
}
