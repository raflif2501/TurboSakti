@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-body">
                Data Stok
                <a class="btn btn-warning mb-2 text-light" href="{{ route('stok.create') }}" style="float: right;">
                    Tambah Stok
                </a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Rasa</th>
                            <th>Jumlah Stok</th>
                            <th>Tanggal Produksi</th>
                            <th>Harga Perbal</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('storage/image/' . $p->gambar) }}" width="100" height="100">
                                </td>
                                <td>{{ $p->rasa }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->tgl_produksi }}</td>
                                <td>{{ $p->harga_perbal }}</td>
                                <td class="text-center">
                                    <form action="{{ route('stok.destroy', $p->id) }}" method="post"
                                        style="display:inline">
                                        <a href="{{ route('stok.edit', $p->id) }}" class="btn btn-warning"><i
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
