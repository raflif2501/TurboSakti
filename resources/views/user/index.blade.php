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
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('user') }}/img/shopping-bag.png" alt="">
                                    </a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        @foreach ($user as $p)
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{ url('image/'.$p->product->gambar) }}" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">{{ $p->product->rasa }}</a>
                                                    <p>Jumlah : {{ $p->jumlah_pemesanan }}<span>&emsp;&emsp;Harga :
                                                            {{ $p->harga }} </span>
                                                    </p>
                                                    @php
                                                        $total = $p->jumlah_pemesanan * $p->harga;
                                                    @endphp
                                                    <span>Subtotal : {{ str($total) }}</span>
                                                </div>
                                                <div class="cart_remove">
                                                    <form action="{{ route('pembayaran.destroy', $p->id) }}" method='post'>
                                                        <button type="submit" class="btn-sm btn-danger rounded-circle"><i class="ion-android-close"></i></button>
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                            @php
                                                $semua = 0;
                                                $semua += $total;
                                            @endphp
                                        @endforeach
                                        {{-- <div class="mini_cart_table">
                                            <div class="cart_total mt-10">
                                                <span>Total:</span>
                                                <span class="price">{{ str($semua) }}</span>
                                            </div>
                                        </div> --}}
                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="{{ route('pembayaran.index') }}">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--mini cart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header area end-->
    <!--Tranding product-->
    <section class="pt-60 pb-30 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Selamat Datang di Website Turbo Sakti</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @php
                    function str($rupiah)
                    {
                        $rp = 'Rp ' . number_format($rupiah, 2, ',', '.');
                        return $rp;
                    }
                @endphp
                @foreach ($data as $p)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="single-tranding">
                            <a href="/detail/{{ $p->id }}">
                                <div class="tranding-pro-img">
                                    <img src="{{ url('image/' . $p->gambar) }}" style="height: 300px; width:auto;">
                                    <h5 class="uppercase">{{ $p->rasa }}</h5>
                                </div>
                                {{-- <div class="tranding-pro-title">
                                </div> --}}
                                <div class="tranding-pro-price">
                                    <div class="price_box">
                                        <span class="current_price">
                                            {{ str($p->harga_jual) }}</span>
                                        {{-- <span class="old_price">$80.00</span> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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
                                    <li><a class="facebook" href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="widgets_container newsletter">
                        <h3>Hubungi Kami</h3>
                        <div class="footer_social_link">
                            <ul>
                                <li><a class="facebook" href="https://api.whatsapp.com/send?phone=6285931260249&text=Hallo%20Agan%20Baik" title="Whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                                <!-- <li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="#" title="instagram"><i class="fa fa-instagram"></i></a></li> -->
                            </ul>
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
    <script src="{{ asset('user') }}/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('user') }}/js/main.js"></script>
</body>

</html>
