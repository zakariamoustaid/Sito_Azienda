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
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #error_div { display:none;}
        #error_email { display:none;}
        #del_no{ display:none; }
        #mod_ok{ display:none;}
        #del_ok{ display:none; }
        #ins_ok{ display:none; }
        #selezione_c{ display:none; }
        #selezione_c2{ display:none; }
        #selezione_c3{ display:none; }
        #selezione_p{ display:none; }
        #selezione_p2{ display:none; }
        #selezione_p3{ display:none; }
        #error_hours{ display:none; }
        #error_hours_day{ display:none; }
        .top-buffer { margin-top:25px; }
        .chart-container {
                    width:500px;
                    height:400px
        }
        #exampleModalCenter{ display:none; }
        #titolo_scheda{ display:none; }
        #data_scheda{ display:none; }
        #progetto_scheda{ display:none; }
        #ore_scheda{ display:none; }
        #note_scheda{ display:none; }
        #add-diary{ display:none; }
        #bottone_chiusura{ display:none; }
        #descrizioneP {display:block;}
        #descrizioneC {display:block;}
        .top-buffer { margin-top:25px; }
        .modal {display:none;}
        #ore {background-color: #f5f1e0;}
        #titolo_scheda_c{display:none;}
        #bottone_chiusura_c{display:none;}
        #inserimento_nome_ref{display:none;}
        #inserimento_cognome_ref{display:none;}
        #inserimento_nome_soc{display:none;}
        #inserimento_email{display:none;}
        #add-class-btn_c{display:none;}
        #header_riepilogo {background-color: #aad6a0;}
    </style>

    <!-- inserisco css personali -->
    <!-- targets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/diary.css') }}" rel="stylesheet">
    
</head>

<div class="container">
<body class="mybody">
    <div id="app">
        <nav id="nav_bar" class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
                <a class="navbar-brand">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    @if(Auth::user()->role == "ADMIN")
                        <li class="nav-item">
                            <a class="nav-link" href="/admin"><b> Home</b></a>  <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::action('ProjectController@index') }}"><strong> Gestione Progetti </strong></a>  <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::action('AssignmentController@index') }}"><strong> Gestione Assegnazioni</strong></a>  <span class="sr-only">(current)</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::action('CustomerController@index') }}"><strong> Gestione Clienti</strong></a> <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::action('UserController@index') }}"><strong> Gestione Utenti</strong></a> <span class="sr-only">(current)</span></a>
                        </li>
                        <!--<li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                        </li>-->
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/diaries"><b> Home</b></a>  <span class="sr-only">(current)</span></a>
                        </li>
                    @endif
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
                        <strong>{{ Auth::user()->name }}</strong>
                        </a>

                        <div id="mydrop" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
</body>
</html>