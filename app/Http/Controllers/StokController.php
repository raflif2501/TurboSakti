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
            $data = Stok::all();
            $data = DB::table('stoks')
            ->join('produks', 'produks.id', '=', 'stoks.id_produks')
            ->get();
            return view('user.index', compact('data',$data));
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
        $this->validate($request, [
            'rasa' => 'required',
            'harga_jual' => 'required',
            'gambar' => 'required',
            'jumlah' => 'required',
            'tgl_produksi' => 'required',
            'harga_perbal' => 'required',
            'id_produk' => 'required'
        ]);

        $image = $request->file('gambar');
        $name = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('image'),$name);

        $data = Produk::create([
            'gambar' => $name,
            'rasa' => $request->rasa,
            'harga_jual' => $request->harga_jual,
        ]);
        $data1 = Stok::create([
            'jumlah' => $request->jumlah,
            'tgl_produksi' => $request->tgl_produksi,
            'harga_perbal' => $request->harga_perbal,
            'id_produk' => $request->id_produk
        ]);
        // dd($data);
        if($data and $data1){
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
    public function detail($id){
        // $data = Produk::find($id);
        $data = Stok::find($id);
        $data = DB::table('stoks')
        ->join('produks', 'produks.id', '=', 'stoks.id_produk')
        ->get();
        // var_dump($data);die;
        return view('user.detail',compact('data', $data));
    }
}
