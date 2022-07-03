@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <div class="card-body">
                    Tambah Stok
                </div>
                <div class="card-body">
                    <div class="form-group">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <form method="POST" action="{{ route('stok.index') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                <label>Rasa</label>
                                <select name="rasa" id="rasa" class="form-control mb-3">
                                    <option value="(160 gram) rasa bawang putih original warna putih">(160 gram) Rasa Bawang Putih Original Warna Putih</option>
                                    <option value="(130 gram) rasa bawang putih original warna kuning">(130 gram) Rasa Bawang Putih Original Warna Kuning</option>
                                    <option value="(160 gram) rasa pedas manis warna putih">(160 gram) Rasa Pedas Manis Warna Kuning</option>
                                    <option value="(130 gram) rasa pedas manis warna merah">(130 gram) Rasa Pedas Manis Warna Putih</option>
                                </select>
                                <label>Harga</label>
                                <input type="text" class="form-control mb-3" name="harga_jual">
                                <label>Gambar</label>
                                <input type="file" class="form-control mb-3" name="gambar">
                                <label>Jumlah</label>
                                <input type="text" class="form-control mb-3" name="jumlah">
                                <label>Tanggal Produksi</label>
                                <input type="date" class="form-control mb-3" name="tgl_produksi">
                                <label>Harga Per ball</label>
                                <input type="text" class="form-control mb-3" name="harga_perbal">
                                <label>Kode Produk</label>
                                <input type="number" class="form-control mb-3"name="id_produk">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-md btn-warning text-light">submit</button>
                        </div>
                        &ensp;
                        <div class="col-md-1">
                            <a href="{{ route('stok.index') }}" type="button"
                                class="btn btn-warning text-light">Kembali</a>
                        </div>
                    </div>
                </div>
        </form>
    </div>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
@endsection
