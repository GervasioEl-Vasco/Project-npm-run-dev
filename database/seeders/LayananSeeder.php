<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanan = [
            [
                'nama_layanan' => 'Cuci Kering',
                'deskripsi' => 'Layanan cuci dan pengeringan pakaian per kilogram.',
                'harga' => 7000,
                'satuan' => 'kg',
                'estimasi_waktu' => 2,
                'status_tersedia' => true,
            ],
            [
                'nama_layanan' => 'Cuci Setrika',
                'deskripsi' => 'Layanan cuci, pengeringan, dan setrika pakaian.',
                'harga' => 10000,
                'satuan' => 'kg',
                'estimasi_waktu' => 2,
                'status_tersedia' => true,
            ],
            [
                'nama_layanan' => 'Setrika Saja',
                'deskripsi' => 'Layanan setrika pakaian bersih per kilogram.',
                'harga' => 5000,
                'satuan' => 'kg',
                'estimasi_waktu' => 1,
                'status_tersedia' => true,
            ],
        ];

        foreach ($layanan as $item) {
            Layanan::updateOrCreate(
                ['nama_layanan' => $item['nama_layanan']],
                $item
            );
        }
    }
}
