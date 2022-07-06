@section('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
@endsection
@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <div class="card-body">
                    Tambah Produk
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
                        <form method="POST" action="{{ route('produk.index') }}">
                            <div class="form-group">
                                @csrf
                                <label>Gambar :</label>
                                <input type="file" name="gambar" class="form-control mb-3">
                                <label>Rasa :</label>
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
                                <label>Harga Jual :</label>
                                <input type="text" class="form-control mb-3"name="harga_jual">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-md btn-primary text-light">submit</button>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('produk.index') }}" type="button"
                                class="btn btn-primary text-light">Kembali</a>
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
