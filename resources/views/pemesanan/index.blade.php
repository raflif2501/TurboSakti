@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <!-- <div class="card-body">
                                                                                                                            Data Stok
                                                                                                                            <a class="btn btn-warning mb-2 text-light" href="{{ route('pemesanan.create') }}" style="float: right;">
                                                                                                                                Tambah Stok
                                                                                                                            </a>
                                                                                                                        </div> -->
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal</th>
                            <th>Rasa Produk</th>
                            <th>Jumlah Produk</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_pemesan }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->rasa }}</td>
                                <td>{{ $p->jumlah_pemesanan }}</td>
                                <td class="text-center">
                                    <form action="{{ route('pemesanan.destroy', $p->id) }}" method="post"
                                        style="display:inline">
                                        <a href="{{ route('pemesanan.show', $p->id) }}" class="btn btn-primary"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="{{ route('pemesanan.edit', $p->id) }}" class="btn btn-warning"><i
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
