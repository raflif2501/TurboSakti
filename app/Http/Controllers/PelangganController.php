<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $auth = auth()->user();
        $no = 1;
        if($auth->hasRole('admin')){
            $data = Pelanggan::all();
            $user = User::count();
            $produk = Produk::count();
            $pelanggan = Pelanggan::count();
            $pemesanan = Pemesanan::count();
            $data = DB::table('pelanggan')
        ->join('users', 'users.id', '=', 'pelanggan.id_pelanggan')
        ->get();
        return view('pelanggan.index', compact('data','produk','user','no','pelanggan','pemesanan',$data));
        } elseif($auth->hasRole('user')){
        return view('user.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pelanggan::create($request->all());
        Alert::success('Success', 'Pelanggan Berhasil Dibuat');
        return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Produk::find($id);
        return view('pelanggan.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produk::find($id);
        $produk = Produk::count();
        $user = User::count();
        $pemesanan = Pemesanan::count();
        return view('pelanggan.edit', compact('data', 'produk','user','pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = Pelanggan::find($id);
         $data->update($request->all());
         $user = User::count();
         Alert::success('Success', 'Pelanggan Berhasil Dirubah');
         return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pelanggan::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Data pelanggan sudah di hapus');
    }
}
