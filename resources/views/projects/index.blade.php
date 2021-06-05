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
                            <a class="nav-link" href=""><b>Progetti</b></a>  <span class="sr-only">(current)</span></a>
                        </li>
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


    <h1> Tutte i Progetti </h1>
    @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    <a href="{{ URL::action('ProjectController@create') }}" class="btn btn-primary float-md-right mb-2">Aggiungi</a>
    <a href="{{ URL::action('ProjectController@show_terminated') }}" class="btn btn-secondary">Visualizza Progetti terminati</a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Registrato</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Cliente</th>
            <th scope="col">Costo Orario</th>
          </tr>
        </thead>
        <tbody>

          @foreach($projects as $p)
          @if($p->terminated != 'yes')
          <tr>
            <th scope="row">{{ date('d/m/Y', strtotime($p->begins)) }}</th>
            <td>{{ $p->name }} </td>
            <td>{{ $p->description }}</td>
            <td>{{ $p->customer->surname_ref }}</td>
            <td>{{ $p->cost }}€</td>
            <td><a href="{{ URL::action('ProjectController@edit', $p) }}" class="btn btn-outline-primary btn-sm">Modifica</a></td>
          </tr>
          @endif
          @endforeach

        </tbody>
      </table>
</body>
</div>
</html>