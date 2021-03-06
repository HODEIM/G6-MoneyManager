<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ __('title.verify') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/logo_negro.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('registerStyle/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <nav id="nav1" class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container px-5">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/logo/logo_blanco.ico') }}" alt="logo" width="50" class="d-inline-block">
                {{__('mm')}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" id="logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-lg"></i></a>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                        </form>
                    </li>
                </ul>
                @include('partials.languageNav')
            </div>
        </div>
    </nav>
    <div class="verify-container">
        <div class="container verify mt-5 d-flex justify-content-center">
            <div class="verify-head ftco-degree-bg">
            </div>
            <div class="verify-body">
                <div class="col-12 text-center">
                    <h2>{{ __('verify.gotmail') }}</h2>
                    <div class="col-12 icon d-flex justify-content-center">
                        <img src="{{ asset('assets/img/email.svg') }}" alt="" class="img-fluid">
                    </div>
                    @if (session('resent'))
                    <h4 class="mb-2 " style="color: green,">{{ __('verify.resent') }}</h4>
                    @else
                    <h4 class="mb-2">{{ __('verify.sentlink') }}</h4>
                    @endif
                    <h3>{{ auth()->user()->email}}</h3>
                    {{ __('verify.resend') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('verify.resendlink') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>