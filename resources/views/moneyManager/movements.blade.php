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
                <img src="{{ asset('assets/logo/logo_blanco.ico') }}" alt="logo" width="50" class="d-inline-block">
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
                <div class="col-xl-4 col-lg-5 col-12">
                    <div class="row">
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
                                                <input type="number" placeholder="Importe" style="width:90%" class="form-control" name="importe" id="importe"></input>
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
                                                <div>
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
                        <div class="col-xl-12 col-lg-12 col-md-6">
                            <button type="button" class="collapsibleCollapse btn"><span class="grande">Filtrar datos</span></button>
                            <div class="contentCollapse">
                                <p class="p-2">Próximamente</p>
                            </div>
                        </div>
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
                                    <a href="#" style="color:black" onclick="event.preventDefault(); document.getElementById('destroyMovement{{$movement->id}}').submit();">
                                        <i class="fas fa-trash fa-lg"></i></a>
                                    <form method="POST" action="/movement/{{$movement->id}}" id="destroyMovement{{$movement->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
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
                        <img src="{{ asset('assets/logo/logo_negro.ico') }}" alt="" class="img-fluid">
                    </div>
                    <h4 class="mb-2">Añadir un nuevo concepto</h4>
                    <form method="POST" class="subscribe-form" action="/concept/store">
                        <div class="form-group d-flex">
                            @csrf
                            <input type="hidden" value="{{$account->id}}" name="accountId">
                            <input type="text" class="form-control rounded-left" placeholder="Ingrese concepto nuevo" name="conceptName">
                            <input type="submit" value="Añadir" class="form-control submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--------- FIN MODAL DE CONCEPTOS  -------->

</body>

<!-- Footer-->
@include('partials.footer')

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
