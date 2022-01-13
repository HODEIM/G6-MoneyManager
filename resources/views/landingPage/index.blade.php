<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Money Manager</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('landing/assets/logo_negro.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="{{ asset('landing/css/styles.css') }}" rel="stylesheet" />
    <!-- Personal CSS-->
    <link href="{{ asset('landing/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/css/login.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav id="nav1" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="lenguageNav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/lang/es">ES</a></li>
                <li class="breadcrumb-item"><a href="/lang/en">EN</a></li>
                <!-- <li class="breadcrumb-item"><a class="nav-link" href="/lang/eu">EU</a></li> -->
            </ol>
        </div>
        <div class="container px-5">
            <a class="navbar-brand" href="#page-top">
                <img src="{{ asset('landing/assets/img/logo_blanco.png') }}" alt="" width="50" class="d-inline-block ">
                Money Manager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="/signup" href="/signup/create">Registrate</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#login" href="#!">Acceder</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login -->
    <div class="modal hide fade in mt-5" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0" style="background: rgba(255, 255, 255, 0) !important;">
                <div class="form-bg">
                    <div class="container">
                        <div class="row">
                            <div style="width:100%;" class="canalAlfa">
                                <div class="form-container">
                                    <div class="form-icon">
                                        <img src="{{asset('landing/assets/logo_blanco.ico')}}" width="100px">
                                    </div>
                                    <form method="POST" class="form-horizontal" action="/loginControl" id="loginForm">
                                        @csrf
                                        <h3 class="title">Acceder</h3>
                                        <div class="form-group" id="padreEmailLogin">
                                            <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                            <input class="form-control" type="email" placeholder="Correo Electrónico" name="email" id="emailLogin">
                                        </div>
                                        <div class="form-group" id="padrePasswordLogin">
                                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                                            <input class="form-control" type="password" placeholder="Contraseña" name="password" id="passwordLogin">
                                        </div>
                                        <input type="submit" class="btn signin" value="Iniciar Sesión" id="enviar" />
                                        <span class="forgot-pass"><a href="#">Forgot Username/Password?</a></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Gestiona tu dinero</h1>
                <h2 class="masthead-subheading mb-0">de manera fácil</h2>
                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Lee mas</a>
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
                        <h2 class="display-4">Observa tus movimientos</h2>
                        <p>Controla tus movimientos de manera visual con diversos graficos. Por ejemplo podras ver los
                            los gastos y o ingresos que llevas en todo el año.</p>
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
                        <h2 class="display-4">Ahorra gastos</h2>
                        <p>¿Compartes piso y siempre divides los gastos de Netflix, comida… con el resto? Organiza
                            mejor las experiencias grupales que hasta hoy eran imposibles de gestionar y ¡que todo
                            el mundo pague lo que debe!</p>
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

                        <h2 class="display-4">Donde quieras, cuando quieras</h2>
                        <p>Conéctate desde cualquier lugar del mundo y desde cualquier dispositivo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section>
        <div class="container px-5 pt-5">
            <div class="row gx-5 mb-5 d-flex justify-content-center">
                <div class="col-lg-5 order-lg-2 text-center">
                    <h2 class="display-4">Contáctanos</h2>
                    <form>
                        <!-- Name && Email address  input -->
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" id="name" type="text" placeholder="Nombre" />
                                </div>
                                <div class="col-6">
                                    <input class="form-control" id="emailAddress" type="email" placeholder="Correo Electronico" />
                                </div>
                            </div>
                        </div>
                        <!-- Message input -->
                        <div class="mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Mensage" style="height: 10rem;"></textarea>
                        </div>
                        <!-- Form submit button -->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" type="submit">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-black">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6 text-center">
                    <i id="instagram" class="fab fa-instagram fa-lg mx-2"></i>
                    <i id="twitter" class="fab fa-twitter fa-lg mx-2"></i>
                    <i id="facebook" class="fab fa-facebook fa-lg mx-2"></i>
                    <i id="phone" class="fas fa-phone fa-lg mx-2"></i>
                </div>
            </div>
            <div class="row my-2">
                <p class="m-0 text-center text-white small">Copyright &copy; Money Manager 2021</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('landing/js/scripts.js')}}"></script>
</body>

</html>