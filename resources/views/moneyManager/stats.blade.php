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

    <!-- Personal JavaScript-->
    <script src="{{ asset('aplicacion/js/logOut.js') }}" type="text/javascript"></script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart', 'bar']
        });
        google.charts.load('current', {
            'packages': ['corechart']
        });

        google.charts.setOnLoadCallback(gastos);
        google.charts.setOnLoadCallback(ingresos);
        google.charts.setOnLoadCallback(usuarios);

        function gastos() {
            <?php $gastoTotal = 0 ?>
            var data = google.visualization.arrayToDataTable([
                ['Gastos', 'Gastos por concepto'],
                <?php foreach ($sqlGastos as $gasto) { ?>
                    <?php foreach ($concepts as $concept) { ?>
                        <?php if ($concept->id ==  $gasto->id_concept) { ?>['<?php echo $concept->concept ?>', <?php echo $gasto->total_amount ?>],
                <?php $gastoTotal = $gastoTotal + $gasto->total_amount;
                        }
                    }
                } ?>

            ]);

            var options = {
                title: 'Gastos: <?php echo $gastoTotal . '€' ?>',
                is3D: true,
                pieSliceText: 'value'
            };

            var chart = new google.visualization.PieChart(document.getElementById('gastos'));

            chart.draw(data, options);
        }

        function ingresos() {
            <?php $ingresoTotal = 0 ?>
            var data = google.visualization.arrayToDataTable([
                ['Ingresos', 'Ingresos por concepto'],
                <?php foreach ($sqlIngresos as $ingreso) { ?>
                    <?php foreach ($concepts as $concept) { ?>
                        <?php if ($concept->id ==  $ingreso->id_concept) { ?>['<?php echo $concept->concept ?>', <?php echo $ingreso->total_amount ?>],
                        <?php $ingresoTotal = $ingresoTotal + $ingreso->total_amount;
                        } ?>
                    <?php } ?>
                <?php } ?>
            ]);

            var options = {
                title: 'Ingresos: <?php echo $ingresoTotal . '€' ?>',
                is3D: true,
                pieSliceText: 'value'
            };

            var chart = new google.visualization.PieChart(document.getElementById('ingresos'));

            chart.draw(data, options);
        }


        function usuarios() {

            var chartDiv = document.getElementById('chart_div');

            var data = google.visualization.arrayToDataTable([
                ['Usuarios', 'Ingresos', 'Gastos'],

                <?php
                foreach ($usuarios as $usuario) {
                    $user = $usuario->name;
                    $gasto = 0;
                    $ingreso = 0;
                    foreach ($gastosUsuario as $gastos) {
                        if ($user == $gastos->user) {
                            $gasto = $gastos->total_amount;
                        }
                    }
                    foreach ($ingresosUsuario as $ingresos) {
                        if ($user == $ingresos->user) {
                            $ingreso = $ingresos->total_amount;
                        }
                    }

                ?>['<?php echo $user ?>', <?php echo $ingreso ?>, <?php echo $gasto ?>],
                <?php } ?>
            ]);

            var materialOptions = {

                chart: {
                    title: 'Resumen usuarios',
                },
                series: {
                    0: {
                        axis: 'Ingresos'
                    },
                    1: {
                        axis: 'Gastos'
                    }
                },
                axes: {
                    y: {
                        Ingresos: {
                            label: 'Ingresos'
                        },
                        Gastos: {
                            side: 'right',
                            label: 'Gastos'
                        }
                    }
                }
            };

            function drawMaterialChart() {
                var materialChart = new google.charts.Bar(chartDiv);
                materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
            }


            drawMaterialChart();
        };
    </script>
</head>




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
        @if($account != null)

        <div class="col-lg-5 col-md-6 m-auto">
            <div class=" d-flex flex-direction-row justify-content-around align-items-center">
                <h1>Graficos de {{$account->name}}</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div id="gastos" style="width: 80%; height: 500px;"></div>
            </div>
            <div class="col-lg-6">
                <div id="ingresos" style="width: 80%; height: 500px;"></div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-lg-6 m-auto col-md-6">
                <div id="chart_div" style="width: 80%; height: 500px;"></div>
            </div>
        </div>

        @endif
    </div>


    <!-- Footer-->
    @include('partials.footer')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->

</body>

</html>