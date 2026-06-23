<?php
namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
class PembayaranController extends Controller
{
    public function index()
    {
        // Menampilkan daftar pesanan yang memerlukan pembayaran/telah dibayar
        $pesanan = Pesanan::with(['user', 'layanan', 'pembayaran'])->latest()->get();
        return view('pesanan.index', compact('pesanan'));
    }
    public function create(Pesanan $pesanan)
    {
        return view('pembayaran.create', compact('pesanan'));
    }
    public function store(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'amount' => 'required|numeric|min:' . $pesanan->total_harga,
        ]);
        $pembayaran = Pembayaran::create([
            'pesanan_id' => $pesanan->id,
            'nominal' => $request->amount,
            'metode_pembayaran' => 'tunai',
            'status' => 'berhasil',
        ]);
        // Tandai pesanan sebagai lunas dan ubah status pesanan ke selesai
        $pesanan->update([
            'status_pembayaran' => 'sudah_bayar',
            'status_pesanan' => 'selesai'
        ]);
        return redirect()->route('pembayaran.show', $pembayaran->id)->with('success', 'Pembayaran berhasil dicatat.');
    }
    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load(['pesanan.user', 'pesanan.layanan']);