<?php

namespace App\Services;

use App\Models\Layanan;

class CostCalculationService
{
    public function hitungTotal(Layanan $layanan, int $beratJumlah): float
    {
        return (float) $layanan->harga * $beratJumlah;
    }
}
