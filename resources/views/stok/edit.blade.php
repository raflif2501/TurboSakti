@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6 position-relative">
                <h2 class="mt-1 text-warning">Edit Stok</h2>
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
                    <form method="POST" action="{{ route('stok.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Rasa</label>
                            <select name="rasa" id="rasa" class="form-control mb-3" value="{{ $data->rasa }}">
                                <option value="(160 gram) rasa bawang putih original warna putih">(160 gram) Rasa Bawang
                                    Putih Original Warna Putih</option>
                                <option value="(130 gram) rasa bawang putih original warna kuning">(130 gram) Rasa
                                    Bawang Putih Original Warna Kuning</option>
                                <option value="(160 gram) rasa pedas manis warna putih">(160 gram) Rasa Pedas Manis
                                    Warna Kuning</option>
                                <option value="(130 gram) rasa pedas manis warna merah">(130 gram) Rasa Pedas Manis
                                    Warna Putih</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control mb-3" name="harga_jual" value="{{ $data->harga }}">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <img src="{{ url('image/' . $data->gambar) }}" width="100" height="100">
                            <input type="file" class="form-control mb-3" name="gambar" value="{{ $data->gambar }}">
                        </div>
                        <div class="form-group">
                            <label for="cases">Jumlah</label>
                            <input type="text" class="form-control mb-3" name="jumlah" value="{{ $data->jumlah }}" />
                        </div>
                        <div class="form-group">
                            <label for="cases">Tanggal Produksi</label>
                            <input type="date" class="form-control mb-3" name="tgl_produksi"
                                value="{{ $data->tgl_produksi }}" />
                        </div>
                        <div class="form-group">
                            <label for="cases">Harga Perbal</label>
                            <input type="text" class="form-control mb-3" name="harga_perbal"
                                value="{{ $data->harga_perbal }}" />
                        </div>
                        <div class="form-group">
                            <label for="cases">ID Procuk</label>
                            <input type="text" class="form-control mb-3" name="id_produk"
                                value="{{ $data->id_produk }}" />
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-md btn-warning text-light">UPDATE</button>
                            </div>
                            &ensp;
                            <div class="col-md-1">
                                <a href="{{ route('stok.index') }}" type="button"
                                    class="btn btn-warning text-light">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
@endsection
