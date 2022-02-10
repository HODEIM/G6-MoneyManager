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

    <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-lg-5 col-md-6 text-center">
                <div class=" d-flex flex-direction-row justify-content-around align-items-center">
                    <h1>{{ __('accounts') }}</h1>
                    <a href="/accounts/create">
                        <i class="no-decoration far fa-plus-square fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-6 m-auto">
                <table class="table table-hover">
                    <tbody id="accountsTable">
                        @if(count($accounts) > 0)
                        @foreach($accounts as $account)
                        <tr>
                            <td name="accountID" hidden>{{ $account->id }}</td>
                            <td>{{ $account->name }}</td>
                            <td>{{ $account->description }}</td>
                            <td>
                                <form method="GET" action="/account/stats">
                                    @csrf
                                    <input type="hidden" name="accountID" value="{{ $account->id }}">
                                    <input type="submit" value="Stats">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3" class="text-center">
                                No tiene ninguna cuenta
                            </td>
                        </tr>
                        @endif
                    </tbody>
                    <table>
            </div>
            <div class="col-lg-5 col-md-6">
                <table>
                    <tr>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Edit
                            </button>
                        </td>
                        <td>
                            <form method="POST" action="/account/destroy/view">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="accountID" value="{{ $account->id }}">
                                <input type="submit" value="Supr">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
>>>>>>> a67a0c611cf74a15cab19e868999d49c84fa677a
    <!-- Footer-->
    @include('partials.footer')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('landing/js/scripts.js')}}"></script>
    <script src="{{ asset('aplicacion/js/user.js')}}"></script>
</body>

</html>