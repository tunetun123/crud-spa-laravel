<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_produk' => 'Nike Air Max 270',
                'jumlah' => 15,
                'harga' => 2000000,
            ],
            [
                'nama_produk' => 'Adidas Ultraboost 22',
                'jumlah' => 10,
                'harga' => 2500000,
            ],
            [
                'nama_produk' => 'Converse Chuck Taylor All Star',
                'jumlah' => 20,
                'harga' => 850000,
            ],
            [
                'nama_produk' => 'Puma RS-X',
                'jumlah' => 8,
                'harga' => 1800000,
            ],
            [
                'nama_produk' => 'Vans Old Skool',
                'jumlah' => 25,
                'harga' => 900000,
            ],
        ];

        foreach ($data as $value) {
            Penjualan::create($value);
        }
    }
}
