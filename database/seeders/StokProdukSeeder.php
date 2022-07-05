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
        'gambar' => 'bawang_putih.png',
        'rasa' => '(130 gram) rasa pedas manis warna merah',
        'harga_jual' => '5000'));

        $this->command->info('Produk telah diisi!');

        # Ciptakan wali si $ayu
        Stok::create(array(
        'jumlah' => '100',
        'harga_perbal' => '50000',
        'id_produk' => $produk1->id,
        ));
        # Informasi ketika semua wali telah diisi.
        $this->command->info('Data produk dan stok telah diisi!');
    }
}
