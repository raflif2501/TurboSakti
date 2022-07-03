<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table ='pemesanans';
    protected $primarykey ='id';
    protected $fillable = ['id', 'id_pelanggan', 'tanggal', 'id_produk', 'jumlah', 'harga','total_harga'];
}
