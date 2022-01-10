<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Movimientos</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('aplicacion/assets/logo_negro.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="{{ asset('aplicacion/css/styles.css') }}" rel="stylesheet" />
    <!-- Personal CSS-->
    <link href="{{ asset('aplicacion/css/miEstilo.css') }}" rel="stylesheet" />
</head>

<body>
    <nav id="nav1" class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container px-5">
            <a class="navbar-brand">
                <img src="{{ asset('landing/assets/img/logo_blanco.png') }}" alt="logo" width="50" class="d-inline-block">
                Money Manager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#!">Movimientos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Ingresos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Gastos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Estadísticas</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#!">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Mis Cuentas</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">

        <div class="text-center m-4 row">
            <div class="col-12">
                <label class="mx-2"><input type="radio" name="cuenta1" checked> Cuenta1</label>
                <label class="mx-2"><input type="radio" name="cuenta1"> Cuenta2</label>
                <label class="mx-2"><input type="radio" name="cuenta1"> Cuenta3</label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 m-auto" id="tabla">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td colspan="4" class="text-center h3">Movimientos</td>
                        </tr>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Concepto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col" class="text-end">Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>03/01/2021</td>
                            <td>Nómina</td>
                            <td>Nomina del mes de enero</td>
                            <th class="text-end text-success">1250,61&#8364;</th>
                        </tr>
                        <tr>
                            <td>05/01/2021</td>
                            <td>Saldo</td>
                            <td>Añadido saldo a la tarjeta del movil</td>
                            <th class="text-end text-danger">-10&#8364;</th>
                        </tr>
                        <tr>
                            <td>07/01/2021</td>
                            <td>Coche</td>
                            <td>Cambio del motor de la ventanilla</td>
                            <th class="text-end text-danger">-250&#8364;</th>
                        </tr>
                        <tr>
                            <td>09/01/2021</td>
                            <td>Bar</td>
                            <td></td>
                            <th class="text-end text-danger">-20,3&#8364;</th>
                        </tr>
                        <tr>
                            <td>09/01/2021</td>
                            <td>Bizum</td>
                            <td>Le he pagado lo que el consumió en el bar</td>
                            <th class="text-end text-success">10,3&#8364;</th>
                        </tr>
                        <tr>
                            <td>13/01/2021</td>
                            <td>Cena</td>
                            <td>Cena del sábado</td>
                            <th class="text-end text-danger">-17,5&#8364;</th>
                        </tr>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-black mt-5">
        <div class="container ">
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