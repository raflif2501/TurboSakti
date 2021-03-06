<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Produk;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = auth()->user();
        if($auth->hasRole('admin')){
            $data = Pemesanan::all();
            $data2 = User::all();
            $no = 1;
            $user = User::count();
            $produk = Produk::count();
            $pemesanan = Pemesanan::count();
            return view('pemesanan.index', compact('data', 'no','user','produk','pemesanan','data2',$data));

        } elseif($auth->hasRole('user')){
        $data = Produk::all();
        $pemesanan = Pemesanan::find();
        return view('user.index', compact('data','pemesanan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth = auth()->user();

        if($auth->hasRole('admin')){
            $user = User::count();
            $produk = Produk::count();
            return view('admin.index', compact('user','produk'));
        } elseif($auth->hasRole('user')){
            $jumlah = $request->jumlah_pemesanan;
            $produk = Produk::where(['id' => $request->id_produk])->get()->all();
            foreach($produk as $row){
                $total = $row->stok - $jumlah;
                $row->update(['stok'=>$total]);
                Pemesanan::create([
                    'id_pemesan' => $request->id_pemesan,
                    'id_produk' => $request->id_produk,
                    'harga' => $request->harga,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'jumlah_pemesanan' => $request->jumlah_pemesanan,
                ]);
                Alert::success('Success', 'Pemesanan Berhasil');
                return redirect()->route('home');
            }
        }
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemesanan::find($id);
        $data->delete();
        return back()->with('success', 'Data sudah di hapus');
    }
}
