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
    <script src="{{ asset('aplicacion/js/fontawesome.js') }}" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Leaflet -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" /> -->
    <link rel="stylesheet" href="{{ asset('aplicacion/css/map.css') }}" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <!-- Personal CSS-->

    <link href="{{ asset('aplicacion/css/miEstilo.css') }}" rel="stylesheet" />
</head>

<body>
    <nav id="nav1" class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container px-5">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/logo/logo_blanco.ico') }}" alt="logo" width="50" class="d-inline-block">
                {{ __('mm') }}
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

    <div class="container-fluid d-flex justify-content-center">
        <div style="width:90%;" class="mt-4 text-center">
            <h2>{{ $account->name }}</h2>
            <div class="mt-4 row d-flex justify-content-center">
                <div class="col-xl-4 col-lg-5 col-12">
                    <div class="row">
                        @if($id_permission[0]->id_permission != 3)
                        <div class="col-xl-12 col-lg-12 col-md-6 mb-2">
                            <button type="button" class="btn collapsibleCollapse" id="anadirBoton">
                                <span class="grande">Añadir</span>
                            </button>
                            <div class="contentCollapse">
                                <form method="POST" action="/movement/store">
                                    <input type="hidden" value="{{$account->id}}" name="accountId">
                                    @csrf
                                    <table style="width:100%" id="tablaAnadir">
                                        <tr>
                                            <th>
                                                Tipo:
                                            </th>
                                            <td class="pt-2">
                                                <select class="form-select" style="width:90%" name="tipo" id="tipo">
                                                    <option selected hidden value="">--Tipo Movimiento--</option>
                                                    <option value="Ingreso">Ingreso</option>
                                                    <option value="Gasto">Gasto</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div id="tipoError" class="ponerRojo"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Importe:
                                            </th>
                                            <td>
                                                <input type="number" step="0.01" placeholder="Importe" style="width:90%" class="form-control" name="importe" id="importe"></input>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div id="importeError" class="ponerRojo"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Concepto:
                                            </th>
                                            <td class="d-flex justify-content-between align-items-center" style="width:90%">


                                                <div class="w-100">
                                                    <select class="form-select" name="concepto" id="concepto">
                                                        <option selected hidden value="">--Concepto--</option>
                                                        @foreach($concepts as $concept)
                                                        <option value="{{ $concept->id }}">{{ $concept->concept  }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <a href="#" id="botonAnadir" style="padding-left: 5px;" data-toggle="modal" data-target="#modalConcepto"><i class="far fa-plus-square fa-lg"></i></a>
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div id="conceptoError" class="ponerRojo"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Descripcion:
                                            </th>
                                            <td>
                                                <textarea placeholder="Descripcion" rows="3" style="width:90%; resize:none;" class="form-control" name="descripcion"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div id="descripcionError" class="ponerRojo"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Fecha:
                                            </th>
                                            <td>
                                                <input type="date" placeholder="Descripcion" style="width:90%" class="form-control" name="fecha" id="fecha"></input>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div id="fechaError" class="ponerRojo"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" id="anadir" value="Añadir">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        @endif
                        <!-- <div class="col-xl-12 col-lg-12 col-md-6 mb-2">
                            <button type="button" class="collapsibleCollapse btn"><span class="grande">Filtrar datos</span></button>
                            <div class="contentCollapse">
                                <p class="p-2">Próximamente</p>
                            </div>
                        </div> -->

                        @if($id_permission[0]->id_permission == 1)
                        <div class="col-xl-12 col-lg-12 col-md-6">
                            <button type="button" class="collapsibleCollapse btn" id="administrar"><span class="grande">Administrar permisos de usuarios</span></button>
                            <div class="contentCollapse">
                                <table style="width:100%" id="tablaAnadir">
                                    <form method="POST" action="/permissions/update">
                                        @csrf
                                        <tr>
                                            @if(count($usuarios) > 1)
                                            <th>
                                                Usuario:
                                            </th>
                                            <td class="pt-2">
                                                <select class="form-select" style="width:90%" name="usuario" id="usuario">
                                                    <option selected hidden value="">--Usuarios--</option>
                                                    @foreach($usuarios as $usuario)
                                                    @if($usuario->name != auth()->user()->name)
                                                    <option value="{{$usuario->id}} ">{{ $usuario->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div id="usuarioError" class="ponerRojo"></div>
                                            </td>
                                        </tr>
                                        <input type="hidden" name="idAccount" value="{{$account->id}}">
                                        <tr>
                                            <th>Permiso:</th>
                                            <td class="py-2">
                                                <select class="form-select" style="width:90%" name="permission" id="permission">
                                                    <option selected hidden value="">--Permisos--</option>
                                                    @foreach($permissions as $permission)
                                                    <option value=" {{$permission->id}} ">{{ $permission->permission }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div id="permisosError" class="ponerRojo"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="py-2">
                                                <input type="submit" value="Cambiar rol" class="btn btn-primary" id="botonPermisos">
                                    </form>
                                    <form method="post" action="/accountUser/destroy" style="float:left;">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="user" id="destroyUser" value="">
                                        <input type="hidden" name="idAccount" value="{{$account->id}}">
                                        <input type="submit" value="Expulsar usuario" class="btn btn-primary" id="botonDisattatch">
                                    </form>
                                    </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <th colspan="2" class="py-4">
                                            <input type="text" value="Invita a tus amigos" readonly style="width:100%" class="form-control">
                                        </th>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-5 col-lg-7 col-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Importe</th>
                                <th scope="col">Concepto</th>
                                <th scope="col">Quien</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($movements) != 0)
                            @foreach($movements as $movement)
                            <tr>
                                @if ($movement->type == "Ingreso")
                                <td style="color:green;">{{$movement->amount}}&#8364</td>
                                @else
                                <td style="color:red;">-{{$movement->amount}}&#8364</td>
                                @endif
                                @if($concepts != null)
                                @foreach($concepts as $concept)
                                @if($concept->id == $movement->id_concept)
                                <td>{{$concept->concept}}</td>
                                @endif
                                @endforeach
                                @endif
                                <td>{{$movement->user}}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="#" id="editMovement" data-toggle="modal" data-target="#modalMovimiento" onclick="editMovement('{{$movement->id}}')"><i class="fas fa-edit fa-lg mx-2" style="color:black;"></i></a>
                                        </form>

                                        <form method="POST" action="/movement/{{$movement->id}}" id="destroyMovement{{$movement->id}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <a href="#" style="color:black" onclick="event.preventDefault(); document.getElementById('destroyMovement{{$movement->id}}').submit();">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <td colspan="4">La cuenta no tiene ningún movimiento</td>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-3 mt-lg-3 mt-md-3">
                    <h2>Resumen</h2>
                    <!-- Variable para calcular el porcentaje de barra que va a enseñar -->
                    <?php $maximo = -99999; ?>
                    <!-- 1.- Necesito esto para calcular el maximo de todos -->
                    @if(count($usuarios) > 0)
                    @if(count($usuarios) > 1)
                    @foreach($usuarios as $usuario)
                    <?php
                    $gastoComunitario = 0;
                    $ingresoComunitario = 0;
                    $gastoTotal = 0;
                    $ingresoTotal = 0;
                    ?>

                    <!-- Foreach, para ver el cuanto se ha gastado, dentro del if cada usuario -->
                    @foreach($gastosUsuario as $gastos)
                    @if($gastos->user == $usuario->name)
                    <?php $gastoTotal += $gastos->amount ?>
                    @endif
                    <?php $gastoComunitario += $gastos->amount ?>
                    @endforeach

                    <!-- Foreach, para ver el cuanto se ha ingresado, dentro del if cada usuario -->
                    @foreach($ingresosUsuario as $ingresos)
                    @if($ingresos->user == $usuario->name)
                    <?php $ingresoTotal += $ingresos->amount; ?>
                    @endif
                    <?php $ingresoComunitario += $ingresos->amount; ?>
                    @endforeach

                    <!-- Cálculo para sacar el máximo de todos -->
                    <?php
                    $totalUsuario = $ingresoTotal - $gastoTotal;
                    $comunitario = $ingresoComunitario - $gastoComunitario;
                    $media = $comunitario / count($usuarios);
                    $cadauno = $media - $totalUsuario;

                    if ($maximo < $cadauno)
                        $maximo = $cadauno;
                    ?>
                    @endforeach

                    <!-- 1.-FIN Hasta aqué necesito para calcular el máximo -->

                    <!-- 2.- A partir de aqui, hago lo mismo que arriba, pero uso los datos todo el rato  -->
                    @foreach($usuarios as $usuario)
                    <?php
                    $gastoComunitario = 0;
                    $ingresoComunitario = 0;
                    $gastoTotal = 0;
                    $ingresoTotal = 0;
                    ?>

                    @foreach($gastosUsuario as $gastos)
                    @if($gastos->user == $usuario->name)
                    <?php $gastoTotal += $gastos->amount ?>
                    @endif
                    <?php $gastoComunitario += $gastos->amount ?>
                    @endforeach

                    @foreach($ingresosUsuario as $ingresos)
                    @if($ingresos->user == $usuario->name)
                    <?php $ingresoTotal += $ingresos->amount; ?>
                    @endif
                    <?php $ingresoComunitario += $ingresos->amount; ?>
                    @endforeach

                    <?php
                    $totalUsuario = $ingresoTotal - $gastoTotal;
                    $comunitario = $ingresoComunitario - $gastoComunitario;
                    $media = $comunitario / count($usuarios);
                    $cadauno = $media - $totalUsuario;

                    $porcentaje = 0;
                    if ($maximo != 0)
                        $porcentaje = ($cadauno * 100) / $maximo;

                    if ($porcentaje < 0) {
                        $porcentaje = 0 - $porcentaje;
                    }
                    $cadauno = number_format($cadauno, 2)
                    ?>

                    <!-- En caso de que lo que debe el usuario sea negativo -->
                    @if($cadauno < 0) <div class="d-flex border border-dark borderBar">
                        <div class="d-flex flex-row-reverse" style="width:50%;">
                            <div class="progress d-flex flex-row-reverse no-bordered-left" style="width:100%; height: 30px;">
                                <div class="progress-bar bg-danger" role="progressbar" style='width:<?php echo $porcentaje ?>%;' aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span>{{ $cadauno }}&#8364</span></div>
                            </div>
                        </div>
                        <div class="" style="width:50%;">
                            <div class="progress no-bordered-right" style="width:100%; height: 30px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 0%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <div style="padding-top: 7px; padding-left: 5px;">
                                    {{ $usuario->name }}
                                </div>
                            </div>
                        </div>
                </div>
                <br>
                <!-- Si lo que debe es positivo -->
                @elseif($cadauno > 0) <div class="d-flex  border border-dark borderBar">
                    <div class="d-flex flex-row-reverse" style="width:50%;">
                        <div class="progress d-flex flex-row-reverse no-bordered-left" style="width:100%; height: 30px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div style="padding-top: 7px; padding-right: 5px;">
                                {{ $usuario->name }}
                            </div>
                        </div>
                    </div>
                    <div class="" style="width:50%;">
                        <div class="progress no-bordered-right" style="width:100%; height: 30px;">
                            <div class="progress-bar bg-success" role="progressbar" style='width:<?php echo $porcentaje ?>%;' aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span>{{ $cadauno }}&#8364</span></div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Por si está en 0 -->
                @else
                <div class="d-flex  border border-dark borderBar">
                    <div class="d-flex flex-row-reverse" style="width:100%;">
                        <div class="progress d-flex flex-row-reverse borderBar" style="width:100%; height: 30px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div style="padding-top: 5px; padding-right: 5px; margin: auto;">
                                {{ $usuario->name }}
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endif
                @endforeach

                <!-- Si la cuenta, es solo una, se plantea algo distinto -->
                @else
                <?php
                $gastoTotal = 0;
                $ingresoTotal = 0
                ?>

                @foreach($gastosUsuario as $gastos)
                <?php $gastoTotal += $gastos->amount ?>
                @endforeach

                @foreach($ingresosUsuario as $ingresos)
                <?php $ingresoTotal += $ingresos->amount ?>
                @endforeach
                <?php
                $totalUsuario = $ingresoTotal - $gastoTotal;
                ?>
                @if($totalUsuario > 0)
                <?php
                $todo = $ingresoTotal + $gastoTotal;
                $porcentaje = $totalUsuario * 100 / $todo;
                ?>
                <div class="d-flex  border border-dark borderBar">
                    <div class="d-flex flex-row-reverse" style="width:50%;">
                        <div class="progress d-flex flex-row-reverse no-bordered-left" style="width:100%; height: 30px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div style="padding-top: 7px; padding-right: 5px;">
                                @foreach($usuarios as $usuario)
                                {{ $usuario->name }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="" style="width:50%;">
                        <div class="progress no-bordered-right" style="width:100%; height: 30px;">
                            <div class="progress-bar bg-success" role="progressbar" style='width:<?php echo $porcentaje ?>%;' aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span>{{ $totalUsuario }}&#8364</span></div>
                        </div>
                    </div>
                </div>
                <br>
                @elseif($totalUsuario < 0) <?php
                                            $todo = $ingresoTotal + $gastoTotal;
                                            $porcentaje = $totalUsuario * 100 / $todo;
                                            $porcentaje = 0 - $porcentaje;
                                            ?> <div class="d-flex  border border-dark borderBar">
                    <div class="d-flex flex-row-reverse" style="width:50%;">
                        <div class="progress d-flex flex-row-reverse no-bordered-left" style="width:100%; height: 30px;">
                            <div class="progress-bar bg-danger" role="progressbar" style='width:<?php echo $porcentaje ?>%;' aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span>{{ $totalUsuario }}&#8364</span></div>
                        </div>
                    </div>


                    <div class=" border border-dark borderBar" style="width:50%;">
                        <div class="progress no-bordered-right" style="width:100%; height: 30px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 0%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div style="padding-top: 7px; padding-left: 5px;">
                                @foreach($usuarios as $usuario)
                                {{ $usuario->user }}
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
            <br>
            @else
            @if(count($movements) != 0)
            <div class="d-flex">
                <div class="" style="width:100%;">
                    <div class="progress borderBar" style="width:100%; height: 30px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <div style="padding-top: 5px; padding-left: 5px; margin:auto">
                            @foreach($usuarios as $usuario)
                            {{ $usuario->user }}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @else
            <div class="d-flex">
                <div class="" style="width:100%;">
                    <div class="progress borderBar" style="width:100%; height: 30px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <div style="padding-top: 4px; margin:auto">
                            No hay ningún movimiento
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @endif
            @endif
            @endif
            @else

            @endif
        </div>
    </div>
    <div class="row my-5 d-flex justify-content-center" id="divInvitar">
        <div class="col-lg-6 col-md-8 col-12 p-4" id="invitar">
            <h1>INVITAR</h1>
            <img src="{{asset('assets/logo/logo_negro.ico')}}" style="width: 40%" class="mb-2">
            <h2>Invita usuarios a tu cuenta</h2>
            <p>Comparte la cuenta con quien tú quieras y empieza a añadir movimientos con tus amigos</p>
            <div class="inputUtilizame">
                <input id="compartir" type="text" class="form-control alto" value="{{$url}}" readonly />
                <div class="tooltipPersonal">
                    <span class="tooltiptextPersonal" id="myTooltipPersonal">Copiar enlace</span>
                    <a href="#nadadenada" id="copiar" style="color:black">
                        <label for="compartir" class="far fa-copy fa-lg input-icon" />
                    </a>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

    <!--------- MODAL DE CONCEPTOS  -------->
    <div class="modal fade" id="modalConcepto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header img">
                    <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="fas fa-times"></span>
                    </button>
                </div>
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center">
                    <h2>Conceptos</h2>
                    <div class="icon d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/logo/logo_negro.ico') }}" alt="" class="img-fluid" />
                    </div>
                    <h4 class="mb-2">Añadir un nuevo concepto</h4>

                    </form>
                    <form method="POST" class="subscribe-form" action="/concept/store">
                        <div class="form-group d-flex">
                            @csrf
                            <input type="hidden" value="{{$account->id}}" name="accountId">
                            <input type="text" class="form-control rounded-left" placeholder="Ingrese concepto nuevo" name="conceptName">
                            <input type="submit" value="Añadir" class="form-control px-3 py-2 submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--------- FIN MODAL DE CONCEPTOS  -------->

    <!--------- MODAL Edit Movimientos  -------->
    <div class="modal fade" id="modalMovimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 45rem !important;">
            <div class=" modal-content">
                <div class=" modal-header img">
                    <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="fas fa-times"></span>
                    </button>

                </div>
                <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center d-flex flex-column justify-content-center text-white">
                    <h2>Movimiento</h2>
                    <table>
                        <tr>
                            <td>Tipo
                                <select class="form-select" name="tipo" id="tipo2">
                                    <option value="Ingreso">Ingreso</option>
                                    <option value="Gasto">Gasto</option>
                                </select>
                            </td>
                            <td>Importe
                                <input type="text" class="form-control" value="Importe" id="importe2" />
                            </td>
                            <td>Concepto
                                <select class="form-select" name="concepto" id="concepto2">
                                    @foreach($concepts as $concept)
                                    <option value="{{ $concept->id }}">{{ $concept->concept  }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Descripcion
                                <input type="text" class="form-control mb-2" value="Descripcion" id="descripcion2" />
                            </td>
                            <td>Fecha
                                <input type="date" class="form-control mb-2" value="Fecha" id="fecha2" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div id="mapContainer" style="width: 100%;" class="mt-3">
                                    <div style="height: 20rem;" id="movementMap"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="d-flex justify-content-end mt-3">
                                    <input type="hidden" id="idMovement" class="form-control w-25" value="Guardar" />
                                    <input type="button" id="updateMovement" class="form-control w-25" value="Guardar" />
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--------- FIN MODAL Edit Movimientos  -------->

</body>

<!-- Footer-->
@include('partials.footer')

<!-- Leaflet -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<!-- <script src="{{ asset('aplicacion/js/map.js')}}"></script> -->

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('aplicacion/js/user.js')}}"></script>
<script src="{{ asset('aplicacion/js/logOut.js')}}"></script>
<script src="{{ asset('aplicacion/js/movements.js')}}"></script>

<script src=" {{ asset('aplicacion/js/bootstrap/popper.js') }} "></script>
<script src=" {{ asset('aplicacion/js/bootstrap/bootstrap.min.js') }}"></script>
<script src=" {{ asset('aplicacion/js/bootstrap/main.js') }}"></script>
</body>

</html>