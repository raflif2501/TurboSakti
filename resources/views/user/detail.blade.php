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
        <div class="main_header table-responsive">
            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="col-lg-6 col-md-8">
                                <div class="logo">
                                    <a href="index-2.html">
                                        <img src="{{ asset('img/logo.png') }}" alt="" width="60"
                                            height="60">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                </div>
                                <img src="{{ asset('user/img/user.png') }}" alt="" width="30"
                                    height="20">
                                <div class="user">
                                    <div class="dropdown">
                                        <a class="ropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <h5 class="uppercase">&ensp;{{ auth()->user()->name }}</h5>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="btn btn-transparant">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-box-arrow-left"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                                        <path fill-rule="evenodd"
                                                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                                    </svg>
                                                    &nbsp;Logout</button>
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
                            <img src="{{ url('image/' . $data1->gambar) }}" width="100" height="100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="#">
                        <h1>{{ $data1->rasa }}</h1>
                        <div class="price_box">
                            <span class="current_price">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                    <path
                                        d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                    <path
                                        d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                </svg>
                                {{ $data1->harga_jual }}</span>
                        </div>
                        <div class="product_desc">
                            <ul>
                                <li><span>Stok : </span>{{ $data1->jumlah }}</li>
                                <li><span>Tanggal Produksi : </span>{{ $data1->tgl_produksi }}</li>
                                <li><span>Harga Per ball : </span>{{ $data1->harga_perbal }}</li>
                            </ul>
                        </div>
                        <div class="product_variant quantity">
                            <label>Jumlah</label>
                            <input min="1" max="100" value="1" type="number">
                            <button class="button" type="submit">add to cart</button>

                        </div>
                    </form>
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
                    <div class="col-lg-4 col-md-6">
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
                            <h3>Follow Us</h3>
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
                            <span class="pull-right">Turbo Sakti Manding</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
    <!-- JS
============================================ -->
    <!-- Plugins JS -->
    <script src="{{ asset('user') }}/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('user') }}/js/main.js"></script>
</body>
<!-- product-details.html  03:24:28 GMT -->

</html>
