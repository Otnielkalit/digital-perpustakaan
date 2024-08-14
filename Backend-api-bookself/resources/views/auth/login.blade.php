{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="login"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email or Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="login" type="text"
                                        class="form-control @error('login') is-invalid @enderror" name="login"
                                        value="{{ old('login') }}" required autocomplete="login" autofocus>

                                    @error('login')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets-publik/img/fav.png">
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Login Ke Digital Perpusatakaan</title>
    <link rel="stylesheet" href="assets-publik/css/linearicons.css">
    <link rel="stylesheet" href="assets-publik/css/owl.carousel.css">
    <link rel="stylesheet" href="assets-publik/css/themify-icons.css">
    <link rel="stylesheet" href="assets-publik/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets-publik/css/nice-select.css">
    <link rel="stylesheet" href="assets-publik/css/nouislider.min.css">
    <link rel="stylesheet" href="assets-publik/css/bootstrap.css">
    <link rel="stylesheet" href="assets-publik/css/main.css">
</head>

<body>
    @include('user.layouts.header')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Login/Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Login/Register</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="assets-publik/img/login.jpg" alt="">
                        <div class="hover">
                            <a class="primary-btn" href="{{ route('register') }}">Buat Akun</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Login</h3>
                        <form class="row login_form" action="{{ route('login') }}" method="POST" id="contactForm"
                            novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input id="login" type="text"
                                    class="form-control @error('login') is-invalid @enderror" name="login"
                                    id="name" placeholder = 'Email atau Phone Number' value="{{ old('login') }}"
                                    required autocomplete="login" autofocus>
                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder = 'Password'>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Keep me logged in</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">

                                <button type="submit" class="primary-btn">
                                    {{ __('Login') }}
                                </button>
                                <a href="{{ route('register') }}">Belum memiliki akun?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('user.layouts.footer')
    <script src="assets-publik/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="assets-publik/js/vendor/bootstrap.min.js"></script>
    <script src="assets-publik/js/jquery.ajaxchimp.min.js"></script>
    <script src="assets-publik/js/jquery.nice-select.min.js"></script>
    <script src="assets-publik/js/jquery.sticky.js"></script>
    <script src="assets-publik/js/nouislider.min.js"></script>
    <script src="assets-publik/js/jquery.magnific-popup.min.js"></script>
    <script src="assets-publik/js/owl.carousel.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="assets-publik/js/gmaps.min.js"></script>
    <script src="assets-publik/js/main.js"></script>
</body>

</html>
