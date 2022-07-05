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

    protected $with = ['product'];

    public function product()
    {
        return $this->belongsTo('App\Models\Produk', 'id_produk');
    }
}
