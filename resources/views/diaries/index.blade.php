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
                            <a class="nav-link" href="#">Visualizza Attivit&agrave</a>  <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Scheda Ore</a> <span class="sr-only">(current)</span></a>
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

    <div class="container">
       <h1> Attività svolte </h1>
       @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
        @endif

        <div class="mt-5"></div>

            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                         <label for="begins">Data Odierna</label>
                        <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="today" >
                        <small class="form-text text-muted">Inserisci la data di oggi</small>
                    </div>
                    <div class="form-group">
                        <label for="customer_id">Seleziona Progetto</label>
                        <select class="form-control" name="project_id">
                        @foreach ($assignments as $a)
                        @if($a->user_id == Auth::user()->id)
                            <option value="{{ $a->id }}">{{ $a->project->name }}</option>
                        @endif
                        @endforeach
                        </select>
                        <small class="form-text text-muted">Seleziona Progetto</small>
                    </div>
                    <div class="form-group">
                        <label for="hours">Ore spese</label>
                        <input type="number" class="form-control" name="hours" >
                        <small class="form-text text-muted">Inserisci Ore spese</small>
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <input type="text" class="form-control" name="note" >
                        <small class="form-text text-muted">Inserisci eventuali note</small>
                    </div>
                </div>
            <div class="col-md-2">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <a href="" id="add-category-btn" class="btn btn-primary float-md-right mb-2" style="margin-top: 30px;">Aggiungi</a>
            </div>
        </div>
    </div>
</body>

</html>

