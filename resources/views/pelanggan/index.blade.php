@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
<div class="row">
        <div class="col-md-6 position-relative">
        <h2 class="mt-1 text-warning">Pelanggan</h2>
        </div>
        <!-- <div class="col-md-6 card-header text-end">
            <a class="btn btn-warning mb-2 text-light" href="{{route('pelanggan.create')}}">
                Tambah Pelanggan
            </a>
        </div> -->
    </div>
    <div class="card mb-4">
        <div class="card-header">
        <div class="card-body">
            Data Pelanggan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Tlp</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datapelanggan as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->no_tlp }}</td>
                        <td class="text-center">
                            <form action="{{ route('pelanggan.destroy', $p->id)}}" method="post" style="display:inline">
                            <a href="{{ route('pelanggan.edit',$p->id)}}" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
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