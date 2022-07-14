<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table ='pemesanans';
    protected $primarykey ='id';
    protected $guarded = [];
    protected $fillable = [
        'id_pemesan','nama_pemesan','id_produk','rasa','harga','alamat','no_hp','jumlah_pemesanan'
    ];
    
    protected $with = ['product'];

    public function product()
    {
        return $this->belongsTo('App\Models\Produk', 'id_produk');
        return Pemesanan::parse($this->attribute['created_at'])->translationFormat('1, d F Y');
    }
}
