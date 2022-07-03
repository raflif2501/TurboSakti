<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;

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
            return view('produk.index', compact('data','produk','user','no'));
        } elseif($auth->hasRole('user')){
            $data = Produk::all();
            return view('user.index', compact('data'));
        }
    }
    public function create()
    {
        $produk = Produk::count();
        $user = User::count();
        return view('produk.create', compact('produk', 'user'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'rasa' => 'required',
            'harga_jual' => 'required',
            'gambar' => 'required'
        ]);

        $image = $request->file('gambar');
        $name = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('image'),$name);

        $data = Produk::create([
        'gambar' => $name,
        'rasa' => $request->rasa,
        'harga_jual' => $request->harga_jual
        ]);

        if($data){
            //redirect dengan pesan sukses
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->route('produk.index');
        }else{
            //redirect dengan pesan error
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
        return view('produk.edit', compact('data', 'produk','user'));
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
            'gambar' => 'required'
        ]);

        $data = Produk::findOrFail($id);

        if($request->file('gambar') == "") {
            $data->update([
                'rasa' => $request->rasa,
                'harga_jual' => $request->harga_jual
        ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/image/'.$data->image);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/image', $image->hashName());

            $data->update([
                'gambar'        => $image->hashName(),
                'rasa'          => $request->rasa,
                'harga_jual'    => $request->harga_jual
            ]);
        }

        if($data){
            //redirect dengan pesan sukses
            Alert::success('Success', 'Data Berhasil Dirubah');
            return redirect()->route('produk.index');
        }else{
        //redirect dengan pesan error
            Alert::error('Gagal', 'Data Gagal Dirubah');
            return redirect()->route('produk.index');
        }
        // $data = Produk::find($id);
        // $data->update($request->all());
        // $produk = Produk::count();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param \App\Models\Produk $produk
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Data sudah di hapus');
    }
}
