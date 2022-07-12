<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Pemesanan;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = auth()->user();

        if($auth->hasRole('admin')){
            $user = User::count();
            $produk = Produk::count();
            $pemesanan = Pemesanan::count();
            $stok = Produk::sum('stok');
            return view('admin.index', compact('user','produk','pemesanan', 'stok'));
        } elseif($auth->hasRole('user')){
            $data = Produk::all();
            $data = Produk::all();
            $pemesanan = Pemesanan::all();
            return view('user.index', compact('data','pemesanan'));
        }
    }
    public function home()
    {
        $data = Produk::all();
        return view('home', compact('data'));
    }
}
