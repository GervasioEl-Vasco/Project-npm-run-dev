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
            'metode_pembayaran' => 'required|string',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti_bayar')) {
            $buktiPath = $request->file('bukti_bayar')->store('bukti_pembayaran', 'public');
        }

        $pembayaran = Pembayaran::create([
            'pesanan_id' => $pesanan->id,
            'nominal' => $pesanan->total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_bayar' => $buktiPath,
            'status' => 'menunggu_konfirmasi',
        ]);

        // Do NOT change status_pesanan here
        // The staff will manage status_pesanan separately.

        return redirect()->route('pesanan.index')->with('success', 'Bukti pembayaran berhasil diunggah. Menunggu konfirmasi admin/staff.');
    }

    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load(['pesanan.user', 'pesanan.layanan']);
        return view('pembayaran.show', ['payment' => $pembayaran]);
    }

    public function konfirmasi(Pembayaran $pembayaran)
    {
        $pembayaran->update(['status' => 'berhasil']);
        $pembayaran->pesanan->update(['status_pembayaran' => 'sudah_bayar']);

        return redirect()->route('pesanan.index')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}