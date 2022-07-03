<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }
    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $auth = auth()->user();
        $no = 1;
        if($auth->hasRole('admin')){
            $data = Stok::all();
            $produk = Produk::count();
            $user = User::count();
            $data = DB::table('stoks')
            ->join('produks', 'produks.id', '=', 'stoks.id_produk')
            ->get();
            return view('stok.index', compact('data','produk','user','no',$data));
        } elseif($auth->hasRole('user')){

        }
    }
    public function create()
    {
        $produk = Produk::count();
        $user = User::count();
        return view('stok.create', compact( 'produk', 'user'));
    }
    public function store(Request $request)
    {
        Stok::create($request->all());
        Produk::create($request->all());
        Alert::success('Success', 'Stok Berhasil Ditambahkan');
        return redirect()->route('stok.index');
    }

    /**
    * Display the specified resource.
    *
    * @param \App\Models\Stok $stok
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $data = Stok::find($id);
        return view('stok.index', compact('data'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param \App\Models\Stok $stok
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $data = Stok::find($id);
        $produk = Produk::count();
        $user = User::count();
        return view('stok.edit', compact('data', 'produk','user'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Models\Produk $produk
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $data = Stok::find($id);
        $data->update($request->all());
        $user = User::count();
        Alert::success('Success', 'Stok Berhasil Dirubah');
        return redirect()->route('stok.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param \App\Models\Produk $produk
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $data = Stok::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Data sudah di hapus');
    }
}
