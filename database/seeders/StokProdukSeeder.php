<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Stok;
use DB;

class StokProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->delete();
        DB::table('stoks')->delete();

        /***********************************
        *** SIAPKAN SEEDER DOSEN DISINI ***
        ***********************************/

        //

        // Kita akan membuat 3 orang produk sebagai sampel
        // Disinilah alasan kenapa saya membuat model terlebih dahulu
        // Karena saya memanfaatkan model untuk mengcreate record

        # Produk Pertama bernama Noviyanto Rachmadi. Dengan NIM 1015015072.
        $produk1 = Produk::create(array(
        'gambar' => '130gram_bawang_putih.png',
        'rasa' => '(130 gram) rasa bawang putih original warna putih',
        'harga_jual' => '5000'));

        $produk2 = Produk::create(array(
            'gambar' => '130gram_pedas_manis_putih.png',
            'rasa' => '(130 gram) rasa pedas manis warna putih',
            'harga_jual' => '5000'));

        $produk3 = Produk::create(array(
            'gambar' => '260gram_bawang_putih.png',
            'rasa' => '(260 gram) rasa bawang putih original warna putih',
            'harga_jual' => '10000'));

        $produk4 = Produk::create(array(
            'gambar' => '260gram_pedes_manis_putih.png',
            'rasa' => '(260 gram) rasa pedas manis warna putih',
            'harga_jual' => '10000'));

        $this->command->info('Produk telah diisi!');

        # Ciptakan wali si $ayu
        Stok::create(array(
        'jumlah' => '100',
        'harga_perbal' => '50000',
        'id_produk' => $produk1->id,
        ));

        Stok::create(array(
            'jumlah' => '200',
            'harga_perbal' => '50000',
            'id_produk' => $produk2->id,
            ));

        Stok::create(array(
            'jumlah' => '300',
            'harga_perbal' => '90000',
            'id_produk' => $produk3->id,
            ));

        Stok::create(array(
            'jumlah' => '400',
            'harga_perbal' => '90000',
            'id_produk' => $produk4->id,
            ));
        # Informasi ketika semua wali telah diisi.
        $this->command->info('Data produk dan stok telah diisi!');
    }
}
