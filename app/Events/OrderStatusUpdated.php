<?php

namespace App\Events;

use App\Models\Pesanan;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Pesanan $pesanan,
        public ?string $statusLama,
        public string $statusBaru,
        public ?string $keterangan = null,
    ) {
        //
    }
}
