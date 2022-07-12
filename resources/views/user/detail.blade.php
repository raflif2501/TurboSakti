<!doctype html>
<html class="no-js" lang="en">
<!--   03:20:39 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Turbo Sakti Manding</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img') }}/logo.png">
    <!-- CSS
    ========================= -->
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('user') }}/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('user') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/custom.css">
</head>

<body>
    <header>
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <img src="{{ asset('img/logo.png') }}" alt="" width="60" height="60">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <div class="middel_right">
                            <div class="search_container">
                                <form action="#">
                                    <div class="search_box" style="display: none;">
                                        <input placeholder="Search product..." type="text">
                                        <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="middel_right_info">
                                <div class="header_wishlist">
                                    <div class="dropdown">
                                        <a class="ropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ asset('user') }}/img/user.png" alt="">
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <h5 class="uppercase">&emsp;{{ auth()->user()->name }}</h5>
                                                <button type="submit" class="btn btn-transparant">
                                                    Logout</button>
                                                <a class="bg-turbo"type="submit"></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li>Detail Produk</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <img src="{{ asset('image/' . $p->gambar) }}" width="800" height="800">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        {{-- @method('PATCH') --}}
                        <h1>{{ $p->rasa }}</h1>
                        <div class="price_box">
                            <span class="current_price">
                                @php
                                    function str($rupiah)
                                    {
                                        $rp = 'Rp ' . number_format($rupiah, 2, ',', '.');
                                        return $rp;
                                    }
                                @endphp
                                {{ str($p->harga_jual) }}</span>
                        </div>
                        <div class="product_desc">
                            <ul>
                                <li><span>Stok &emsp;:
                                    </span>{{ $p->stok }}
                                </li>
                                <!-- <li><span>harga_per_ball &emsp;:
                                    </span>{{ str($p->harga_per_ball) }}
                                </li> -->
                            </ul>
                        </div>
                        <form action="{{ route('pemesanan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('HEAD') --}}
                            <div class="form-group row" style="display: none;">
                                <label class="col-sm-2 col-form-label">ID &emsp;&emsp;&emsp;&emsp;: </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" name="id_pemesan"
                                        value="{{ auth()->user()->id }}">
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <label class="col-sm-2 col-form-label">Nama &emsp;&emsp;&emsp;&emsp;: </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" name="nama_pemesan"
                                        value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <label class="col-sm-2 col-form-label">ID Produk &ensp;: </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" name="id_produk"
                                        value="{{ $p->id }}">
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <label class="col-sm-2 col-form-label">Rasa &ensp;&ensp;&ensp;&ensp;&ensp;:
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" name="rasa"
                                        value="{{ $p->rasa }}">
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <label class="col-sm-2 col-form-label">Harga &emsp;&ensp;&ensp;: </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" name="harga"
                                        value="{{ $p->harga_jual }}">
                                </div>
                            </div>
                            <textarea type="text" class="form-control mb-1" name="alamat" placeholder="Masukkan Alamat"></textarea>
                            <input type="text"class="form-control mb-1" name="no_hp"
                                placeholder="Masukkan No HP">
                            <div class="product_variant quantity">
                                <label>Jumlah</label>
                                <input min="1" max="{{ $p->jumlah }}" value="1" type="number"
                                    name="jumlah_pemesanan">
                                <button class="button" type="submit">Pesan Sekarang</button>
                            </div>
                            {{-- <input type="number" class="form-control mb-3"name="total_harga"
                                value="{{ $p->harga_jual * $p->jumlah_pemesanan }}"> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--product details end-->
    <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="#"><img src="{{ asset('img') }}/typo_p.png" alt=""></a>
                            </div>
                            <div class="footer_contact">
                                <p>Toko Turbo Sakti Manding adalah usaha pribadi yang bergerak di penjualan olahan dari
                                    singkong asli. Toko turbo sakti yang berlokasi
                                    Jln. Raya Manding, Manding Daya, Kec. Manding Laok, Kab. Sumenep, Jawa timur 69452.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container newsletter">
                            <h3>Follow Kami</h3>
                            <div class="footer_social_link">
                                <ul>
                                    <li><a class="facebook" href="#" title="Facebook"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#" title="Twitter"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#" title="instagram"><i
                                                class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="copyright_area">
                            <h4><span class="pull-right">Turbo Sakti Manding</span></4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    @include('sweetalert::alert')
    <!-- JS
============================================ -->
    <!-- Plugins JS -->
    <script src="{{ asset('user') }}/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('user') }}/js/main.js"></script>
</body>
<!-- product-details.html  03:24:28 GMT -->

</html>
