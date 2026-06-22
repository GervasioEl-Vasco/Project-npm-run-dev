<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogStatus extends Model
{
    use HasFactory;

    protected $table = 'log_status_pesanan';

    protected $fillable = [
        'pesanan_id',
        'status_sebelumnya',
        'status_baru',
        'keterangan',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
