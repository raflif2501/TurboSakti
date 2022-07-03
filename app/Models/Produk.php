<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected  $guarded =[];
    public function stok()
    {
        return $this->belongsTo('App\Models\Stok', 'id_produk');
    }
}
