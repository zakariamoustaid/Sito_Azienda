<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .top-buffer { margin-top:25px; }
        .chart-container {
                    width:500px;
                    height:400px
        }
        #myChart {
            display:none;
        }
        #myChart2 {
            display:none;
        }
    </style>

    <!-- inserisco css personali -->
    <!-- css Diario User -->
    <link href="{{ asset('css/diary.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    
</head>

<div class="container">
<body class="mybody">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Home</a>  <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::action('ProjectController@index') }}">Gestione Progetti</a>  <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::action('AssignmentController@index') }}">Gestione Assegnazioni</a>  <span class="sr-only">(current)</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::action('CustomerController@index') }}">Gestione Clienti</a> <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::action('UserController@index') }}">Gestione Utenti</a> <span class="sr-only">(current)</span></a>
                        </li>
                        <!--<li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                        </li>-->
                        </ul>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- HOME -->
        <h3 class="card-title">Buongiorno {{ Auth::user()->name }}</h3>
        <p class="card-text">Qui di seguito una panoramica della situazione</p>
        <div class="row top-buffer"></div>
        <div class="row top-buffer"></div>
        <p class="card-text">Totale utenti registrati: {{ $tot_user }}</p>
        <p class="card-text">Totale utenti assegnati: </p>
        <button id="but"> clicca qui </button>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
            <canvas id="myChart2"></canvas>
        </div>


</body>
</div>
</html>

<script type="text/javascript">
(function($) {
    $('document').ready(function(){
        $("#but").bind('click', function(){
            var ctx = document.getElementById('myChart').getContext('2d');
            var projects = @json($lista_proj);
            var hours = @json($ore_proj);
            var customers = @json($lista_cust);
            var hours_c = @json($ore_cust);
            console.log(hours);
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: projects,
                    datasets: [{
                        label: 'ORE SPESE PER OGNI PROGETTO',
                        data: hours,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive:true,
                    maintainAspectRatio: false,
                    indexAxis: 'x',
                }
            });
            var ctx = document.getElementById('myChart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: customers,
                    datasets: [{
                        label: 'ORE SPESE PER OGNI PROGETTO',
                        data: hours_c,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive:true,
                    maintainAspectRatio: false,
                    indexAxis: 'x',
                }
            });
        });
});
})(jQuery);
</script>