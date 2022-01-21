@if($user != null)
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
    <!-- Personal JavaScript-->
    <script src="{{ asset('aplicacion/js/editarUsuarios.js') }}" type="text/javascript"></script>
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
                {{__('mm.admin')}}
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
                    <li class="nav-item"><a class="nav-link" href="#!">{{ __('statistics') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">{{ __('profile') }}</a></li>
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
    <!-- CONTENIDO -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-lg-8 text-center">
                <h1>{{ __('users.edit') }}</h1>
            </div>
        </div>
        <form method="POST" action="/admin/update" enctype="multipart/form-data">
            @method("PATCH")
            @csrf
            <div class="row m-auto d-flex justify-content-around" style="width: 80%">
                <div class="col-lg-4 col-md-6">
                    <a href="/admin" style="float:left"><i class="fas fa-arrow-circle-left fa-lg" id="atras"></i></a>
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
                <div class="col-lg-1 col-1"></div>
                <div class="col-lg-7 col-md-5 mt-3">
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
                            <th>Rol actual: {{$user->rol->rol}}</th>
                            <td>
                                <select class="form-select" name="rol" id="rol">
                                    <option value="null" selected hidden>--Cambiar Rol--</option>
                                    @if($rols != null)
                                    @foreach($rols as $rol)
                                    <option value="{{$rol->id}}">{{$rol->rol}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Bloqueado:</th>
                            <td>
                                <label class="switch">
                                    @if ($user->locked == 1)
                                    <input type="checkbox" id="locked" checked name="locked">
                                    @else
                                    <input type="checkbox" id="locked" name="locked">
                                    @endif
                                    <span class="slider round"></span>
                                    <span class="absolute-no">NO</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Guardar" class="btn btn-secondary" class="form-control" id="guardar">
                            </td>

        </form>
        <td>
            <form method="post" action="/admin/{{$user->id}}">
                @csrf
                @method("delete")
                <input type="submit" class="btn btn-primary" value="Eliminar" />
            </form>
        </td>
        </tr>
        </table>
    </div>
    </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-black mt-5">
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
</body>

</html>

@else

@endif