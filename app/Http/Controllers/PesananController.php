<?php
namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Layanan;
use App\Models\LogStatus;
use App\Models\User;
use App\Services\CostCalculationService;
use Illuminate\Http\Request;
class PesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with(['user', 'layanan']);
        // Jika bukan admin/staff, batasi hanya melihat pesanan milik sendiri
        if ($request->user()->role !== 'admin' && $request->user()->role !== 'staff') {
            $query->where('user_id', $request->user()->id);
        }

        // Sembunyikan pesanan yang sudah tutup buku dari daftar antrean aktif
        $query->whereNotIn('status_pesanan', ['diambil', 'dibatalkan']);

        $pesanan = $query->latest()->get();
        return view('pesanan.index', compact('pesanan'));
    }
    public function create()
    {
        $layanan = Layanan::where('status_tersedia', true)->get();
        $users = User::where('role', 'customer')->get();
        return view('pesanan.create', compact('layanan', 'users'));
    }
    public function store(Request $request, CostCalculationService $costCalculationService)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'layanan_id' => 'required|exists:layanan,id',
            'berat_jumlah' => 'required|numeric|min:0.1',
            'catatan' => 'nullable|string',
        ]);
        $layanan = Layanan::findOrFail($request->layanan_id);
        $total_harga = $costCalculationService->hitungTotal($layanan, (float) $request->berat_jumlah);
        $pesanan = Pesanan::create([
            'user_id' => $request->user_id,
            'layanan_id' => $layanan->id,
            'berat_jumlah' => $request->berat_jumlah,
            'total_harga' => $total_harga,
            'status_pesanan' => 'menunggu',
            'status_pembayaran' => 'belum_bayar',
            'catatan' => $request->catatan,
        ]);
        LogStatus::create([
            'pesanan_id' => $pesanan->id,
            'status_sebelumnya' => null,
            'status_baru' => 'menunggu',
            'keterangan' => 'Pesanan baru dibuat',
        ]);
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat.');
    }
}