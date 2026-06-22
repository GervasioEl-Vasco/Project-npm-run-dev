<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'pesanan_id',
        'nominal',
        'metode_pembayaran',
        'bukti_bayar',
        'status',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
