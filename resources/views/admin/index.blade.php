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
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- inserisco css personali -->
    <!-- css Diario User -->
    <link href="{{ asset('css/diary.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    
</head>

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
    <div id="chartContainer" style="height: 300px; width: 50%;">
  </div>
</body>
</html>
<script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {            
      title:{
        text: "Fruits sold in First & Second Quarter"              
      },

      data: [  //array of dataSeries     
      { //dataSeries - first quarter
 /*** Change type "column" to "bar", "area", "line" or "pie"***/        
       type: "column",
       name: "First Quarter",
       showInLegend: true,
       dataPoints: [
       { label: "banana", y: 55 },
       { label: "orange", y: 69 },
       { label: "apple", y: 50 },                                    
       { label: "mango", y: 55 },
       { label: "grape", y: 64 }
       ]
     },

     { //dataSeries - second quarter

      type: "column",
      name: "Second Quarter", 
      showInLegend: true,               
      dataPoints: [
      { label: "banana", y: 63 },
      { label: "orange", y: 73 },
      { label: "apple", y: 88 },                                    
      { label: "mango", y: 77 },
      { label: "grape", y: 60 }
      ]
    }
    ],
 /** Set axisY properties here*/
    axisY:{
      prefix: "$",
      suffix: "K"
    }    
  });

chart.render();
}
</script>

