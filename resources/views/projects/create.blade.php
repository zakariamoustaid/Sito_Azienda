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
<div class="container">
<body class="mybody">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                <a class="navbar-brand" href="{{ url('/') }}" onclick="return confirm('Inserimento non confermato, sicuro di voler uscire?');">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" onclick="return confirm('Inserimento non confermato, sicuro di voler uscire?');" href="/admin">Home</a>  <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href=""><b>Inserimento Progetto</b></a>  <span class="sr-only">(current)</span></a>
                        </li>
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

    <h1> Inserimento Progetto </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ URL::action('ProjectController@store') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" name="name" >
          <small class="form-text text-muted">Inserisci nome progetto</small>
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control" name="description" >
            <small class="form-text text-muted">Inserisci descrizione</small>
        </div>

        <div class="form-group">
            <label for="note">Note</label>
            <input type="text" class="form-control" name="note" >
            <small class="form-text text-muted">Inserisci eventuali note</small>
        </div>

        <div class="form-group">
            <label for="begins">Data Inizio</label>
            <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="begins" >
            <small class="form-text text-muted">Inserisci la data di inizio</small>
        </div>

        <div class="form-group">
            <label for="p_end">Data Possibile Fine</label>
            <input type="date" value="<?php echo date('Y-m-d', + strtotime("+30 days")); ?>" class="form-control" name="p_end" >
            <small class="form-text text-muted">Inserisci possibile data fine</small>
        </div>

        <div class="form-group">
            <label for="d_end">Data Fine</label>
            <input type="date" class="form-control" name="d_end" >
            <small class="form-text text-muted">Inserisci la data di scadenza se disponibile</small>
        </div>

        <div class="form-group">
            <label for="customer_id">Seleziona Cliente</label>
            <select class="form-control" name="customer_id">
                @foreach ($customers as $c)
                    <option value="{{ $c->id }}">{{ $c->ragione_sociale }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Seleziona cliente di riferimento</small>
        </div>
        
        <div class="form-group">
            <label for="cost">Costo Orario</label>
            <input type="number" class="form-control" name="cost" >
            <small class="form-text text-muted">Inserisci costo orario</small>
        </div>
        
        <!--<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />-->

        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ URL::action('ProjectController@index') }}" onclick="return confirm('Inserimento non confermato, sicuro di voler uscire?');" class="btn btn-secondary">Indietro</a>

    </form>    
</body>
</div>
</html>


<script>
function myFunction() {
  document.getElementById("demo").style.color = "red";
}
</script>