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
                <!-- <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#!">Movimientos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Ingresos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Gastos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Estadísticas</a></li>
                </ul> -->
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
            <div class="row my-5 d-flex justify-content-center" id="divInvitar">
                <div class="col-lg-6 col-md-8 col-12 p-4" id="invitar">
                    <h1>INVITACION</h1>
                    <img src="{{asset('assets/logo/logo_negro.ico')}}" style="width: 40%" class="mb-2">
                    @if ($errors->any())
                    @error('existes')
                    <br><br>
                    <h4 style="color:red">{{$message}}</h4>
                    <br>
                    <div>
                        <a href="/account/{{$account->id}}" class="btn btn-success"> Acceder a la cuenta </a>
                    </div>
                    @enderror
                    @else
                    <h2>{{$user}} te ha invitado a la cuenta de: {{$account->name}}</h2>
                    <p>Haz click en el boton para aceptar la invitación y empezar a registrar movimientos</p>
                    <div>
                        <form method="post" action="/accounts/acceptInvitation">
                            @csrf
                            <input type="hidden" name="id" value="{{$account->id}}">
                            <input type="submit" class="btn btn-success" value="Aceptar invitación" />
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    @include('partials.footer')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
</body>

</html>