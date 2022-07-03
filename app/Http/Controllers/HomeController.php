<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Stok;

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
            return view('user.index', compact('data'));
        }else{
            $data = Produk::all();
            return view('/', compact('data'));
        }
    }
}
