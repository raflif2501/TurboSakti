@section('css')

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

@endsection
@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6 position-relative">
                <h2 class="mt-1 text-warning">Jenis Product</h2>
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
                    <form method="POST" action="{{ route('produk.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="country_name">Gambar :</label>
                            <input type="file" class="form-control mb-3" name="gambar"
                                placeholder="image"value="{{ $data->gambar }}" />
                        </div>
                        <div class="form-group">
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
                        </div>
                        <div class="form-group">
                            <label for="cases">Harga Jual :</label>
                            <input type="text" class="form-control mb-3" name="harga_jual"
                                value="{{ $data->harga_jual }}" />
                        </div>
                        <div class="row ">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-md btn-primary text-light">UPDATE</button>
                            </div>
                            &ensp;
                            <div class="col-md-1">
                                <a href="{{ route('produk.index') }}" type="button"
                                    class="btn btn-primary text-light">Kembali</a>
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
