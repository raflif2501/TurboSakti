@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4"></h1>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Jenis Produk</div>
                    <center>
                        <h5>{{ $produk }}</h5>
                    </center>
                    <br>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('produk.index') }}">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Jumlah Pemesan</div>
                    <center>
                        <h5>{{ $pemesanan }}</h5>
                    </center>
                    <br>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pemesanan.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Stok Produk</div>
                    <center>
                        <h5>{{ $stok }}</h5>
                    </center>
                    <br>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('produk.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Jumlah Pembayaran</div>
                    <center>
                        <h5>{{ $pemesanan }}</h5>
                    </center>
                    <br>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('pembayaran.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card text-center">
        <div class="card" style= "margin-top: 120px">
        </div>
        <div class="card-body">
            <h2 class="card-title">SELAMAT DATANG DI APLIKASI KERIPIK SINGKONG TURBO SAKTI</h2>
        </div>
        <div class="text-muted">
        </div>
        </div>
    @endsection
