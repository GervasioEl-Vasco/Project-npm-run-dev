<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();

        return response()->json([
            'message' => 'Data layanan berhasil diambil.',
            'data' => $layanan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'estimasi_waktu' => 'required|integer',
        ]);

        $layanan = Layanan::create($request->all());

        return response()->json([
            'message' => 'Layanan berhasil ditambahkan.',
            'data' => $layanan,
        ], 201);
    }

    public function show(Layanan $layanan)
    {
        return response()->json([
            'message' => 'Detail layanan berhasil diambil.',
            'data' => $layanan,
        ]);
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'estimasi_waktu' => 'required|integer',
        ]);

        $layanan->update($request->all());

        return response()->json([
            'message' => 'Layanan berhasil diupdate.',
            'data' => $layanan,
        ]);
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return response()->json([
            'message' => 'Layanan berhasil dihapus.',
        ]);
    }
}
