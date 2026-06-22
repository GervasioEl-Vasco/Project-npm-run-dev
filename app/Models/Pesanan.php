<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'layanan_id',
        'berat_jumlah',
        'total_harga',
        'status_pesanan',
        'status_pembayaran',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function logStatus()
    {
        return $this->hasMany(LogStatus::class);
    }

    public function pengecekan()
    {
        return $this->hasMany(Pengecekan::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
