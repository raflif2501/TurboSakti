@section('css')

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

@endsection
@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-body">
                Data Jenis Produk
                <a class="btn btn-warning mb-2 text-light" href="{{ route('produk.create') }}" style="float: right;">
                    Tambah Jenis
                </a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Rasa </th>
                            <th>Harga Jual</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ asset('image/'.$p->gambar) }}" width="100" height="100">
                                </td>
                                <td>{{ $p->rasa }}</td>
                                <td>{{ $p->harga_jual }}</td>
                                <td class="text-center">
                                    <form action="{{ route('produk.destroy', $p->id) }}" method="post"
                                        style="display:inline">
                                        <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-warning"><i
                                                class="fas fa-pencil"></i></a>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
@endsection
