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
                  <li class="nav-item"><a class="nav-link" href="/admin" onclick="return confirm('Inserimento non confermato, sicuro di voler uscire?');">Home</a><span class="sr-only">(current)</span></a></li>
                  <li class="nav-item"><a class="nav-link" href=""><b>Gestione Utente</b></a><span class="sr-only">(current)</span></a></li>
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
    <h1> Gestione Cliente </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ URL::action('UserController@update', $user) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="surname">Cognome</label>
            <input type="text" class="form-control" name="surname" value="{{ $user->surname }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}" disabled> 
        </div>

        <div class="form-group">
            <label for="tel">Telefono</label>
            <input type="text" class="form-control" name="tel" value="{{ $user->tel }}">
            <small class="form-text text-muted">Inserisci il cognome</small>
        </div>

        <div class="form-group">
            @if(Auth::user()->email == $user->email)
               <label for="role">Ruolo</label>
               <input type="text" class="form-control" name="role" value="{{ $user->role }}" readonly> <!-- readonly al posto di disable in quanto crea errori nel controller-->
            @else
               <label for="role">Ruolo</label>
               <select class="form-control" name="role">
               <option disabled> ruolo corrente "{{ $user->role }}" </option>
                  <option> - </option>
                  <option> ADMIN </option>
                  <option> USER </option>
               </select>
            @endif
            <small class="form-text text-muted">Modifica il ruolo</small>
        </div>
        

        <button type="submit" class="btn btn-primary">Aggiorna</button>
        @if(Auth::user()->email != $user->email)
         <a href="{{ URL::action('UserController@destroy', $user) }}" onclick="return confirm('Confermare la cancellazione?');" class="btn btn-danger">Termina Contratto</a>
         @endif
        <a href="{{ URL::action('UserController@index') }}" onclick="return confirm('Modifiche non confermate, sicuro di voler uscire?');" class="btn btn-secondary">Indietro</a>

    </form>    
</div>