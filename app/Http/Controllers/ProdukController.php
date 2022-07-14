<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
use DB;

class ProdukController extends Controller
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
            $data = Produk::all();
            $produk = Produk::count();
            $user = User::count();
            $pemesanan = Pemesanan::count();
            return view('produk.index', compact('data','produk','user','pemesanan','no'));
        } elseif($auth->hasRole('user')){
            $data = Produk::all();
            return view('user.index', compact('data',$data));
        }
    }
    public function create()
    {
        $produk = Produk::count();
        $user = User::count();
        $pemesanan = Pemesanan::count();
        return view('produk.create', compact('produk', 'user','pemesanan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'rasa' => 'required|unique:produks',
            'harga_jual' => 'required',
            'gambar' => 'required',
            'stok' => 'required',
        ]);

        $image = $request->file('gambar');
        $name = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('image'),$name);

        $harga_per_ball = $request->harga_jual * 10;

        $data = Produk::create([
            'gambar' => $name,
            'rasa' => $request->rasa,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'harga_per_ball' => $harga_per_ball,
        ]);
        if($data){
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->route('produk.index');
        }else{
            Alert::error('Gagal', 'Data Gagal Ditambahkan');
            return redirect()->route('produk.index');
        }
    }

    /**
    * Display the specified resource.
    *
    * @param \App\Models\Produk $produk
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $data = Produk::find($id);
        return view('user.index', compact('data'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param \App\Models\Produk $produk
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $data = Produk::find($id);
        $produk = Produk::count();
        $user = User::count();
        $pemesanan = Pemesanan::count();
        return view('produk.edit', compact('data', 'produk','user','pemesanan'));
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
        $this->validate($request, [
            'rasa' => 'required',
            'harga_jual' => 'required',
            'gambar' => 'required',
            'stok' => 'required'
        ]);

        $data = Produk::findOrFail($id);
        

        if($request->file('gambar') == "") {
            $data->update([
                'rasa' => $request->rasa,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok
        ]);

        } else {

            Storage::disk('local')->delete('image/'.$data->image);

            $image = $request->file('gambar');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image'),$name);

            $data->update([
                'gambar'        => $name,
                'rasa'          => $request->rasa,
                'harga_jual'    => $request->harga_jual,
                'stok' => $request->stok
            ]);
        }

        if($data){
            Alert::success('Success', 'Data Berhasil Dirubah');
            return redirect()->route('produk.index');
        }else{
            Alert::error('Gagal', 'Data Gagal Dirubah');
            return redirect()->route('produk.index');
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param \App\Models\Produk $produk
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $data = Produk::find($id);
        $data->delete();
        return back()->with('success', 'Data sudah di hapus');
    }
    public function detail($id){

        $p = Produk::find($id);

        return view('user.detail',compact('p', $p));
    }
}
