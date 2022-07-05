@extends('layouts.app')

@section('content')
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
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $p)
                        <tr>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_tlp }}</td>
                            <td class="text-center">
                                <form action="{{ route('pelanggan.destroy', $p->id) }}" method="post"
                                    style="display:inline">
                                    <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning"><i
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