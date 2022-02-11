<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Money Manager</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/logo_negro.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <!-- Personal CSS-->
    <link href="{{ asset('landing/css/landing.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav id="nav1" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container px-5">
            <a class="navbar-brand" href="#page-top">
                <img src="{{ asset('assets/logo/logo_blanco.ico') }}" alt="" width="60" class="d-inline-block ">
                {{__('mm')}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    @auth

                    @else
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="/signup" href="{{ route('register') }}">{{ __('signup') }}</a></li>
                    @endauth

                    @auth
                    <li class="nav-item"><a class="nav-link" href="/accounts">{{ __('myaccounts') }}</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#login" href="#!">{{ __('signin') }}</a></li>
                    @endauth
                </ul>
                @include('partials.languageNav')
            </div>
        </div>
    </nav>
    <!-- Login -->
    <div class="modal hide fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="background: rgba(255, 255, 255, 0) !important;">
                <div class="form-bg">
                    <div class="container">
                        <div class="row">
                            <div>
                                <div class="form-container">
                                    <div class="form-icon">
                                        <img src="{{ asset('assets/logo/logo_blanco.ico') }}" width="100px">
                                    </div>
                                    <form method="POST" class="form-horizontal" action="/loginControl" id="loginForm">
                                        @csrf
                                        <h3 class="title">{{ __('signin') }}</h3>
                                        <div class="form-group" id="padreEmailLogin">
                                            <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                            <input class="form-control" type="email" placeholder="{{ __('email') }}" name="email" id="emailLogin" value="{{ old('email')}}">
                                        </div>
                                        <div class="form-group" id="padrePasswordLogin">
                                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                                            <input class="form-control" type="password" placeholder="{{ __('password') }}" name="password" id="passwordLogin">
                                        </div>
                                        <span class="forgot-pass text-start m-2 text-danger" id="error">
                                            @error('validation') {{ $message }} @enderror
                                        </span>
                                        <span class="forgot-pass text-start m-2">
                                            <label class="textoDecoracion">
                                                <input type="checkbox" name="remember">
                                                Recuérdame
                                            </label>
                                        </span>
                                        <input type="submit" class="btn signin" value="{{ __('login') }}" id="enviar" />
                                        <span class="forgot-pass"><a href="{{ route('password.request')}}">{{ __('forgot') }}</a></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->
    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">{{ __('title1') }}</h1>
                <h2 class="masthead-subheading mb-0">{{ __('subtitle1') }}</h2>
                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">{{ __('more') }}</a>
            </div>
        </div>
        <img src="{{ asset('landing/assets/img/francosuizo.png') }}" class="bg-coins bg-coin-5">
        <img src="{{ asset('landing/assets/img/rublo.png') }}" class="bg-coins bg-coin-6">
        <img src="{{ asset('landing/assets/img/won.png') }}" class="bg-coins bg-coin-7">
        <div class="bg-circle-2 bg-circle">
            <img src="{{ asset('landing/assets/img/yen.png') }}" class="bg-coins bg-coin-2">
        </div>
        <div class="bg-circle-4 bg-circle">
            <img src="{{ asset('landing/assets/img/euro.png') }}" class="bg-coins bg-coin-4">
        </div>
        <div class="bg-circle-1 bg-circle">

            <img src="{{ asset('landing/assets/img/libra.png') }}" class="bg-coins bg-coin-1">
        </div>
        <div class="bg-circle-3 bg-circle">
            <img src="{{ asset('landing/assets/img/dollar.png') }}" class="bg-coins bg-coin-3">
        </div>
    </header>

    <!-- Content section 1-->
    <section id="scroll">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2 ">
                    <div class="p-5 hero-animation-img">
                        <img class="img-fluid-2 d-none d-lg-block animation-two" src="{{ asset('landing/assets/img/hero-animation-01.svg') }}" alt="..." />
                        <img class="img-fluid  animation-one" src="{{ asset('landing/assets/img/hero-single-img-1.svg') }}" alt="..." />
                        <img class="img-fluid-2 d-none d-lg-block animation-four" src="{{ asset('landing/assets/img/hero-animation-03.svg') }}" alt="..." />
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">{{ __('landinginfo1') }}</h2>
                        <p>{{ __('landinginfo2') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 2-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('landing/assets/img/ahorro.png') }}" alt="..." />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">{{ __('landinginfo3') }}</h2>
                        <p>{{ __('landinginfo4') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 3-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('landing/assets/img/devices.png') }}" alt="..." />
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">{{ __('landinginfo5') }}</h2>
                        <p>{{ __('landinginfo6') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action -->
    <section>
        <div class="callBody">
            <h2>Registrate</h2>
            <div class="separatorBar">
                <div class="bar"></div>
            </div>
            <h4>Registrate ahora pada poder gestionar tus gastos</h4>
            <div>
                <form class="callFrom" method="get" action="{{ route('register') }}">
                    <button class="custom-btn btn-15">{{ __('signup') }}</button>
                </form>
            </div>
        </div>
    </section>
    <!-- End Call To Action-->
    <!-- Contact -->
    <section>
        <div class="container px-5 pt-5">
            <div class="row gx-5 mb-5 d-flex justify-content-center">
                <div class="col-lg-5 order-lg-2 text-center">
                    <h2 class="display-4">{{ __('ContactTitle') }}</h2>
                    <form method="POST" action="/send/mail">
                        @csrf
                        <!-- Name && Email address  input -->
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="{{ __('name') }}" />
                                    @error('name')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input class="form-control" name="email" id="emailAddress" type="email" placeholder="{{ __('email') }}" />
                                    @error('email')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Message input -->
                        <div class="mb-3">
                            <textarea class="form-control" name="msg" id="message" type="text" placeholder="{{ __('message') }}" style="height: 10rem;"></textarea>
                            @error('msg')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Form submit button -->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" type="submit">{{ __('send') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    @include('partials.footer')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('landing/js/landing.js')}}"></script>
    @if($errors->get('validation') != null )
    <script src="{{ asset('landing/js/scriptModal.js') }}" type="text/javascript"></script>
    @endif

</body>

</html>