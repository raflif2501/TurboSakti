<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('loginn/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('loginn/css/owl.carousel.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('loginn/css/bootstrap.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('loginn/css/style.css') }}">
    <title>Registrasi Akun</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img') }}/logo.png">
</head>

<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('img/logo-.png');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Registrasi Akun</h3>
                        <br>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group first">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama" id="name"
                                    name="name">
                            </div>
                            <div class="form-group first">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukkan email" id="email" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" class="form-control" placeholder="Masukkan Password"
                                    id="password" name="password">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" class="form-control" placeholder="Masukkan Password Confirmation"
                                    id="password" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-block btn-warning">Register</button>
                        </form>
                        <span class="ml-auto"><a href="{{ route('login') }}" class="login">Login
                                disini</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('loginn/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('loginn/js/popper.min.js') }}"></script>
    <script src="{{ asset('loginn/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('loginn/js/main.js') }}"></script>
</body>

</html>
