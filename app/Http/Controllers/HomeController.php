<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Stok;
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
            $pelanggan = Pelanggan::count();
            return view('admin.index', compact('user','produk','pelanggan'));
        } elseif($auth->hasRole('user')){
            $data = Produk::all();
            $data1 = Stok::all();
            return view('user.index', compact('data','data1'));
        }
    }
    public function home()
    {
        $data = Produk::all();
        return view('home', compact('data'));
    }
}
