<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'id' => '1',
            'gambar' => '130gram_bawang_putih_original_warna_putih.png',
            'rasa' => 'rasa bawang putih original warna putih (130)',
            'harga_jual' => '5000',
            'stok' => '100',
            'harga_per_ball' => '50000'
        ]);

        Produk::create([
            'id' => '2',
            'gambar' => '130gram_pedas_manis_warna_putih.png',
            'rasa' => 'rasa pedas manis warna putih (130)',
            'harga_jual' => '5000',
            'stok' => '200',
            'harga_per_ball' => '50000'
        ]);

        Produk::create([
            'id' => '3',    
            'gambar' => '260gram_bawang_putih_original_warna_putih.png',
            'rasa' => 'rasa bawang putih original warna putih (260)',
            'harga_jual' => '10000',
            'stok' => '300',
            'harga_per_ball' => '90000'
        ]);
    }
}
