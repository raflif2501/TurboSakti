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
                    <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label>Rasa :</label>
                            <input type="text" class="form-control mb-3" name="rasa">
                            <label>Harga :</label>
                            <input type="text" class="form-control mb-3" name="harga_jual">
                            <label>Gambar :</label>
                            <input type="file" class="form-control mb-3" name="gambar">
                            <label>Jumlah Stok :</label>
                            <input type="text" class="form-control mb-3" name="stok">
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-md btn-primary text-light">submit</button>
                    </div>
                    &ensp;
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
