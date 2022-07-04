<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_pelanggan')->constrained('pelanggan');
            $table->string('nama_pemesan');
            $table->foreignId('id_produk')->constrained('produks');
            $table->string('rasa');
            $table->string('harga');
            $table->string('total_harga')->nullable()->change();
            $table->string('jumlah_pemesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
