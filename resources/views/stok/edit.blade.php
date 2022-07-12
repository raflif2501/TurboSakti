@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-6 position-relative">
            <h2 class="mt-1 text-primary">Edit Stok</h2>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                @foreach ($data as $p)
                    <form method="POST" action="{{ route('stok.update', $p->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Rasa</label>
                            <select name="rasa" id="rasa" class="form-control mb-3">
                                <option value="(130 gram) rasa bawang putih original warna putih">(130 gram) Rasa Bawang
                                    Putih Original Warna Putih</option>
                                <option value="(260 gram) rasa bawang putih original warna putih">(260 gram) Rasa
                                    Bawang Putih Original Warna Putih</option>
                                <option value="(130 gram) rasa pedas manis warna putih">(130 gram) Rasa Pedas Manis
                                    Warna Putih</option>
                                <option value="(260 gram) rasa pedas manis warna putih">(260 gram) Rasa Pedas Manis
                                    Warna Putih</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control mb-3" name="harga_jual"
                                value="{{ $p->harga_jual }}">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <img src="{{ url('image/' . $p->gambar) }}" width="100" height="100">
                            <input type="file" class="form-control mb-3" name="gambar" value="{{ $p->gambar }}">
                        </div>
                        <div class="form-group">
                            <label for="cases">Jumlah</label>
                            <input type="text" class="form-control mb-3" name="jumlah"
                                value="{{ $p->jumlah }}" />
                        </div>
                        <div class="form-group">
                            <label for="cases">Harga Per ball</label>
                            <input type="text" class="form-control mb-3" name="harga_perbal"
                                value="{{ $p->harga_perbal }}" />
                        </div>
                        <div class="form-group">
                            <label for="cases">Kode Produk</label>
                            <input type="text" class="form-control mb-3" name="id_produk"
                                value="{{ $p->id_produk }}" />
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-md btn-primary text-light">UPDATE</button>
                            </div>
                            &ensp;
                            <div class="col-md-1">
                                <a href="{{ route('stok.index') }}" type="button"
                                    class="btn btn-primary text-light">Kembali</a>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
@endsection
