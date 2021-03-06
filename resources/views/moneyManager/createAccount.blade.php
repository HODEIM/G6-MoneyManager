<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Movimientos</title>
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
    <link href="{{ asset('aplicacion/css/miEstilo.css') }}" rel="stylesheet" />
    <link href="{{ asset('aplicacion/css/fixedFooter.css') }}" rel="stylesheet" />
    <!-- Personal JavaScript-->
    <script src="{{ asset('aplicacion/js/logOut.js') }}" type="text/javascript"></script>
</head>

<body>
    <nav id="nav1" class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container px-5">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('landing/assets/img/logo_blanco.png') }}" alt="logo" width="50" class="d-inline-block">
                Money Manager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/exchange">{{ __('exchange') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="/accounts">{{ __('myaccounts') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="/profile/edit">{{ __('profile') }}</a></li>
                    <li class="nav-item">
                        <form action="/logoutControl" method="POST">
                            @csrf
                            <a href="#" class="nav-link" id="logout"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                        </form>
                    </li>
                </ul>
                @include('partials.languageNav')
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-7 col-10 text-center mt-3">
                <h1>A??adir cuenta nueva</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-7 col-10 mt-3 m-auto">
                <form method="POST" action="/accounts/store">
                    @csrf
                    <table class="miTabla">
                        <tr>
                            <td>
                                Nombre:
                            </td>
                            <td>
                                <input type="text" class="form-control mt-2" placeholder="Nombre" name="name" id="name">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="nameError" class="mensajeErrores"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Descripcion:
                            </td>
                            <td>
                                <input type="text" class="form-control mt-2" placeholder="Descripcion" name="description" id="description">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="descriptionError" class="mensajeErrores"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary mt-2" value="Crear cuenta" id="create">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>




    <!-- Footer-->
    @include('partials.footer')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('aplicacion/js/account.js')}}"></script>

</body>

</html>