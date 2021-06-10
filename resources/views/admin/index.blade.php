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
        .alert-danger { display:none;}
        .top-buffer { margin-top:25px; }
        .chart-container {
                    width:500px;
                    height:400px
        }
        #descrizioneP {display:block;}
        #descrizioneC {display:block;}
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
                <a class="navbar-brand">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin"><b> Home</b></a>  <span class="sr-only">(current)</span></a>
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
    <!-- Alert -->
    <div id="error_div" class="alert alert-danger">
            <p> Selezionare un range di date corretto!</p>
    </div>

    <!-- HOME -->
        <h3 class="card-title"><strong> Buongiorno {{ Auth::user()->name }} </strong></h3>
        <div class="row top-buffer"></div>
        <p class="card-text">Qui di seguito troverai una panoramica della situazione Progetti/Clienti</p>

        <!-- sezione project -->
        <div style="width: 500px; float: right;">
        <div class="row top-buffer"></div>
        <div class="row top-buffer"></div>
        <button type="button" class="btn btn-dark" disable>Sezione Ore Progetti</button>
        <div class="row top-buffer"></div>
        <div class="row">
            <div class="col">
                <label>Da:</label>
                <input type="date" value="<?php echo date('Y-m-01'); ?>" class="form-control" id="data" >
            </div>
            <div class="col">
                <label>A:</label>
                <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="data2" >
            </div>
            <div class="col">
                <div class="row top-buffer"></div>
                <button type="button" id="Chart1" class="btn btn-primary btn-lg">Conferma</button>
            </div>
        </div>
        <div class="row top-buffer"></div>
        <small class="form-text text-muted" id="descrizioneP"><strong>Di seguito sono visualizzate le ore totali di questo mese, selezionare il range di interesse per maggiori dettagli.</strong></small>
        <div class="chart-container">
            <canvas id="myChart1"></canvas>
        </div>
        </div>

        <!-- Sezione customer -->
        <div style="width: 500px; float: left;">
        <div class="row top-buffer"></div>
        <div class="row top-buffer"></div>
        <button type="button" class="btn btn-dark" disable>Sezione Ore Clienti</button>
        <div class="row top-buffer"></div>
        <div class="row">
            <div class="col">
                <label>Da:</label>
                <input type="date" value="<?php echo date('Y-m-01'); ?>" class="form-control" id="data3" >
            </div>
            <div class="col">
                <label>A:</label>
                <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="data4" >
            </div>
            <div class="col">
                <div class="row top-buffer"></div>
                <button type="button" id="Chart2" class="btn btn-primary btn-lg">Conferma</button>
            </div>
        </div>
        <div class="row top-buffer"></div>
        <small class="form-text text-muted" id="descrizioneC"><strong>Di seguito sono visualizzate le ore totali di questo mese, selezionare il range di interesse per maggiori dettagli.</strong></small>
        <div class="chart-container">
            <canvas id="myChart2"></canvas>
        </div>
        </div>
        
</body>
</div>
</html>

<script type="text/javascript">
(function($) {
    $('document').ready(function(){

        //grafico projects
        var chart1 = document.getElementById('myChart1').getContext('2d');
        const projects = @json($projects);
        const diaries = @json($diaries);
        var projects_names = [];
        var tot_h = 0;
        var hours2 = [];
        //projects.forEach(element => console.log(element.id));
        const customers = @json($customers);
        var data_input = $('#data').val();
        var data_input2 = $('#data2').val();
        //console.log(data_input, data_input2);
        if(data_input == '' || data_input2 == '')
            $('#error_div').css('display', 'block').fadeOut(5000);

        for(p of projects)
        {
            projects_names.push(p.name);
            for(d of diaries)
            {
                if(d.today >= data_input && d.today <= data_input2 && d.project_id == p.id)
                {
                    tot_h = d.hours + tot_h;
                }
            }

            hours2.push(tot_h);
            tot_h = 0;

        }

        //console.log(hours);
        if(window.myCharts != undefined)
            window.myCharts.destroy();
        window.myCharts = new Chart(chart1, {
            type: 'bar',
            data: {
                labels: projects_names,
                datasets: [{
                    label: 'ORE SPESE PER OGNI PROGETTO',
                    data: hours2,
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

        //grafico customers
        var chart2 = document.getElementById('myChart2').getContext('2d');
        var customers_names = [];
        tot_h = 0;
        var hours3 = [];
        //projects.forEach(element => console.log(element.id));
        var data_input = $('#data3').val();
        var data_input2 = $('#data4').val();
        //console.log(data_input, data_input2);
        if(data_input == '' || data_input2 == '')
            $('#error_div').css('display', 'block').fadeOut(5000);

        for(c of customers)
        {
            customers_names.push(c.ragione_sociale);
            for(p of projects)
            {
                for(d of diaries)
                {
                    if(p.customer_id == c.id && d.today >= data_input && d.today <= data_input2 && d.project_id == p.id)
                    {
                        tot_h = d.hours + tot_h;
                        
                    }
                }
            }
            hours3.push(tot_h);
            tot_h = 0;
        }

        if(window.myCharts2 != undefined)
            window.myCharts2.destroy();
        window.myCharts2 = new Chart(chart2, {
            type: 'bar',
            data: {
                labels: customers_names,
                datasets: [{
                    label: 'ORE SPESE PER OGNI CLIENTE ',
                    data: hours3,
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
    
        $("#Chart1").bind('click', function(){
            $('#descrizioneP').css('display', 'none');
            var chart1 = document.getElementById('myChart1').getContext('2d');
            const projects = @json($projects);
            const diaries = @json($diaries);
            var projects_names = [];
            var tot_h = 0;
            var hours2 = [];
            //projects.forEach(element => console.log(element.id));
            const customers = @json($customers);
            var data_input = $('#data').val();
            var data_input2 = $('#data2').val();
            //console.log(data_input, data_input2);
            if(data_input == '' || data_input2 == '' || data_input > data_input2)
                $('#error_div').css('display', 'block').fadeOut(5000);

            else{
                for(p of projects)
                {
                    projects_names.push(p.name);
                    for(d of diaries)
                    {
                        if(d.today >= data_input && d.today <= data_input2 && d.project_id == p.id)
                        {
                            tot_h = d.hours + tot_h;
                        }
                    }
                    hours2.push(tot_h);
                    tot_h = 0;
                }

                //console.log(hours);
                if(window.myCharts != undefined)
                    window.myCharts.destroy();
                window.myCharts = new Chart(chart1, {
                    type: 'bar',
                    data: {
                        labels: projects_names,
                        datasets: [{
                            label: 'ORE SPESE PER OGNI PROGETTO',
                            data: hours2,
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
            }
        });

        //parte customer
        $("#Chart2").bind('click', function(){
            $('#descrizioneC').css('display', 'none');
            var chart2 = document.getElementById('myChart2').getContext('2d');
            const customers = @json($customers);
            const diaries = @json($diaries);
            const projects = @json($projects);
            var customers_names = [];
            var tot_h = 0;
            var hours3 = [];
            //projects.forEach(element => console.log(element.id));
            var data_input = $('#data3').val();
            var data_input2 = $('#data4').val();
            //console.log(data_input, data_input2);
            if(data_input == '' || data_input2 == '' || data_input > data_input2)
                $('#error_div').css('display', 'block').fadeOut(5000);
            else{
                for(c of customers)
                {
                    customers_names.push(c.ragione_sociale);
                    for(p of projects)
                    {
                        for(d of diaries)
                        {
                            if(p.customer_id == c.id && d.today >= data_input && d.today <= data_input2 && d.project_id == p.id)
                            {
                                tot_h = d.hours + tot_h;
                                
                            }
                        }
                    }
                    hours3.push(tot_h);
                    tot_h = 0;
                }

                if(window.myCharts2 != undefined)
                    window.myCharts2.destroy();
                window.myCharts2 = new Chart(chart2, {
                    type: 'bar',
                    data: {
                        labels: customers_names,
                        datasets: [{
                            label: 'ORE SPESE PER OGNI CLIENTE ',
                            data: hours3,
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
            }
        });
});
})(jQuery);
</script>