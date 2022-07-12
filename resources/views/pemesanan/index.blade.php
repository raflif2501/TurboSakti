@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-body">
                <h4>Data Pemesanan</h4>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Tanggal</th>
                            <th>Rasa Produk</th>
                            <th>Jumlah</th>
                            <th>Total harga</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            function str($rupiah){
                                $rp = "Rp " . number_format($rupiah,2,',','.');
                                return $rp;
                            }
                        @endphp
                        @foreach ($data as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data2->where('id', $p->id_pemesan)->first()->name }}</td>
                                <td>{{ $nama_pemesan }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->no_hp }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->product->rasa }}</td>
                                <td>{{ $p->jumlah_pemesanan }}</td>
                                @php
                                    $total = $p->jumlah_pemesanan * $p->harga;
                                @endphp
                                <td>{{ str($total) }}</td>
                                <td class="text-center">
                                    <form action="{{ route('pemesanan.destroy', $p->id) }}" method="post"
                                        style="display:inline">
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
