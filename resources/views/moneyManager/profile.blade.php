<?php
$user = auth()->user();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Perfil</title>
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
        <div class="container px-5">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('landing/assets/img/logo_blanco.png') }}" alt="logo" width="50" class="d-inline-block">
                {{__('Money manager')}}
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
                    @if ($user->locked == 1)
                    <li class="nav-item"><a class="nav-link" href="/accounts">{{ __('statistics') }}</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="/exchange">{{ __('exchange') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="/accounts">{{ __('myaccounts') }}</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="/profile/edit">{{ __('profile') }}</a></li>
                    <li class="nav-item">
                        <form action="/logoutControl" method="POST">
                            @csrf
                            <a class="nav-link" id="logout"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                        </form>
                    </li>
                </ul>
                @include('partials.languageNav')
            </div>
        </div>
    </nav>
    <!-- CONTENIDO -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-lg-8 text-center">
                <h1>Perfil</h1>
            </div>
        </div>
        <form method="POST" action="/profile/update" enctype="multipart/form-data" class="mb-5">
            @method("PATCH")
            @csrf
            <div class="row m-auto d-flex justify-content-around" style="width: 80%">
                <div class="col-lg-5 col-md-6 col-12 d-flex justify-content-center">
                    <a href="/accounts" style="float:left"><i class="fas fa-arrow-circle-left fa-lg" id="atras"></i></a>
                    <div id="divImagenUsuario">
                        <label>
                            <div class="divOculto">
                                <h3>Cambiar imagen</h3>
                            </div>
                            <img src="{{Storage::url($user->image)}}" class="rounded-circle" id="imagenPersonal">
                            <input type="file" name="avatar" hidden />
                        </label>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-12 mt-3 d-flex justify-content-center">
                    <table>
                        <tr>
                            <th>Id:</th>
                            <td>{{$user->id }}</td>
                            <input type="hidden" name="id" id="id" value="{{$user->id }}">
                        </tr>
                        <tr class="form-group">
                            <th>Nombre:</th>
                            <td class="form-label">
                                <input type="text" value="{{$user->name}}" id="name" class="form-control" name="name" placeholder="Nombre">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="nameError" class="mensajeErrores"></div>
                            </td>
                        </tr>
                        <tr>
                            <th>Apellidos:</th>
                            <td>
                                <input type="text" value="{{$user->surname}}" id="surname" class="form-control" name="surname" placeholder="Apellidos">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="surnameError" class="mensajeErrores"></div>
                            </td>
                        </tr>
                        <tr>
                            <th>Contraseña:</th>
                            <td>
                                <input type="password" placeholder="Contraseña" id="password" class="form-control" name="password">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="passwordError" class="mensajeErrores"></div>
                            </td>
                        </tr>
                        <tr>
                            <th>Repetir Contraseña: </th>
                            <td>
                                <input type="password" placeholder="Repetir Contraseña" id="password_confirmation" class="form-control" name="password_confirmation">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="password2Error" class="mensajeErrores"></div>
                            </td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>
                                <input type="email" value="{{$user->email}}" class="form-control" id="emailInput" name="email" placeholder="Email">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="emailError" class="mensajeErrores"></div>
                            </td>
                        </tr>
                        <tr>
                            <th>Telefono:</th>
                            <td>
                                <input type="number" value="{{$user->telephone}}" class="form-control no-controls" id="telephone" name="telephone" placeholder="Telefono">
                            </td>
                        </tr>
                        <tr>
                            <th>Direccion:</th>
                            <td>
                                <input type="text" value="{{$user->address}}" class="form-control" id="address" name="address" placeholder="Direccion">
                            </td>
                        </tr>
                        <tr>
                            <th>Miembro desde:</th>
                            <td>
                                <?php echo substr($user->created_at, 0, 11); ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" value="Guardar" class="btn btn-secondary" class="form-control" id="guardar">
                            </td>

        </form>
        <td>
            <form method="post" action="/profile/lock">
                @csrf
                @method("PATCH")
                <input type="submit" class="btn btn-primary" value="Dar de baja" />
            </form>
        </td>
        </tr>
        </table>
    </div>
    </div>
    </div>
    <!-- Footer-->
    @include('partials.footer')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Personal JS-->
    <script src="{{ asset('aplicacion/js/admin.js')}}"></script>
    <script src="{{ asset('aplicacion/js/logOut.js') }}" type="text/javascript"></script>
</body>

</html>