<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <script src="{{ asset('js/app.js') }}" defer></script>
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/diary.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   </head>
   <body class="mybody">
      <div id="app">
         <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
            </a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link" href="/admin">Home</a><span class="sr-only">(current)</span></a></li>
                  <li class="nav-item"><a class="nav-link" href=""><b>Gestione Assegnazioni</b></a><span class="sr-only">(current)</span></a></li>
               </ul>
            </div>
            <ul class="navbar-nav ml-auto">
               @guest
               <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
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
         <div class="container">
    <h1> Tutte le Assegnazioni </h1>

    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
@if (session('ok'))
    <div class="alert alert-success">
        {{ session('ok') }}
    </div>
@endif
   
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Registrato</th>
            <th scope="col">Nome Progetto</th>
            <th scope="col">Utenti</th>
            <th scope="col">Descrizione</th>
          </tr>
        </thead>
        <tbody>

          @foreach($assignments as $a)
          <tr>
            <th scope="row">{{ date('d/m/Y', strtotime($a->begins)) }}</th>
            <td>{{ $a->project->name }} </td>
            <td>{{ $a->user->name }} {{ $a->user->surname }}</td>
            <td>{{ $a->description }}</td>
            <td><a href="{{ URL::action('AssignmentController@destroy', $a) }}" onclick="return confirm('Confermare la cancellazione?');" class="btn btn-danger">Cancella</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ URL::action('AssignmentController@create') }}" class="btn btn-primary float-md-right mb-2">Nuova Assegnazione</a>
</div>
    </div>
   </body>
</html>