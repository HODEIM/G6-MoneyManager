<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Editar datos</title>
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
    <link href="{{ asset('aplicacion/css/fixedFooter.css') }}" rel="stylesheet" />
    <link href="{{ asset('exchanger/css/main.css') }}" rel="stylesheet" />
</head>

<body>
    <nav id="nav1" class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container px-5">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('landing/assets/img/logo_blanco.png') }}" alt="logo" width="50" class="d-inline-block">
                {{__('mm')}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse  text-end" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/accounts">{{ __('myaccounts') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="/profile/edit">{{ __('profile') }}</a></li>
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

    <!---- Content ---->
    <div class="container">
        <div class="row" id="exchange">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-evenly align">
                <div class="col-4 d-flex flex-column">
                    <label for="importe">{{ __('amount') }}</label>
                    <input type="number" step="0.01" class="form-control" id="importe" />
                    <span id="amountError"></span>
                </div>
                <div class="col-4 d-flex flex-column w-25">
                    <label for="from">{{ __('from') }}</label>
                    <select class="form-select" name="from" id="from">
                    </select>
                </div>
                <div class="col-4  d-flex flex-column w-25">
                    <label for="to">{{ __('to') }}</label>
                    <select class="form-select" name="to" id="to">
                    </select>
                </div>
            </div>
            <div class="resultado">
                <div id="result">
                    <span class="h3"></span>
                    <h2></h2>
                </div>
                <div class="exchange">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <!---- End Content ---->

    <!---- Footer ---->
    @include('partials.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--  -->
    <script src="{{ asset('exchanger/js/exchanger.js')}}"></script>
</body>

</html>