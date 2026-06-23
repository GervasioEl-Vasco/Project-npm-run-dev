<?php
namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Pengecekan;
use Illuminate\Http\Request;
class PengecekanController extends Controller
{
    public function index()
    {
        // Mengambil seluruh pesanan untuk ditampilkan status pemeriksaannya
        $pesanan = Pesanan::with(['user', 'layanan', 'pengecekan'])->latest()->get();
        return view('pengecekan.index', compact('pesanan'));
    }
    public function create(Pesanan $pesanan)
    {
        $pesanan->load(['user', 'layanan', 'pengecekan']);
        return view('pengecekan.create', compact('pesanan'));
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
        // Setelah dicek, ubah status pesanan menjadi 'diproses'
        $pesanan->update([
            'status_pesanan' => 'diproses'
        ]);
        return redirect()->route('pengecekan.index')->with('success', 'Hasil pengecekan berhasil dicatat dan status pesanan diperbarui menjadi Diproses.');
    }
}