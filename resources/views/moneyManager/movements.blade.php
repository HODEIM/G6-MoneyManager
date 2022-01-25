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
</head>

<body>
    <nav id="nav1" class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="lenguageNav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/lang/es">ES</a></li>
                <li class="breadcrumb-item"><a href="/lang/en">EN</a></li>
                <!-- <li class="breadcrumb-item"><a class="nav-link" href="/lang/eu">EU</a></li> -->
            </ol>
        </div>
        <div class="container px-5">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('landing/assets/img/logo_blanco.png') }}" alt="logo" width="50" class="d-inline-block">
                Money Manager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/accounts">{{ __('myaccounts') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="/profile/edit">{{ __('profile') }}</a></li>
                    <li class="nav-item">
                        <form action="/logoutControl" method="POST">
                            @csrf
                            <a href="#" class="nav-link" id="logout"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid d-flex justify-content-center">
        <div style="width:80%;" class="mt-4 text-center">
            <h2>{{ $account->name }}</h2>
            <div class="mt-4 row d-flex justify-content-center">
                <div class="col-lg-3">
                    <button type="button" class="btn mb-2 collapsibleCollapse" id="anadirBoton">Añadir</button>
                    <div class="contentCollapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <button type="button" class="collapsibleCollapse btn">Busqueda Avanzada</button>
                    <div class="contentCollapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Importe</th>
                                <th scope="col">Concepto</th>
                                <th scope="col">Quien</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-3">
                    <h2>Resumen</h2>
                </div>
            </div>
        </div>
    </div>



</body>

<!-- Footer-->
@include('partials.footer')

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('aplicacion/js/user.js')}}"></script>
<script src="{{ asset('aplicacion/js/logOut.js')}}"></script>
</body>

</html>
