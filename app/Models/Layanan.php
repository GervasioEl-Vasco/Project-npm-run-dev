<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga',
        'satuan',
        'estimasi_waktu',
        'status_tersedia',
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
