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
      <style>
         .alert-danger { display:none;}
      </style>
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
            <a class="navbar-brand" >
            {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="/admin" onclick="return confirm('Inserimento non confermato, sicuro di voler uscire?');">Home</a>  <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href=""><b>Gestione Utenti</b></a> <span class="sr-only">(current)</span></a>
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

   <h1> Inserimento Utente </h1>
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif

   @if (session('no'))
    <div style="display: block" class="alert alert-danger" >
        {{ session('no') }}
    </div>
   @endif
         <form action="{{ URL::action('UserController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
               <label for="name">Nome</label>
               <input type="text" class="form-control" name="name" >
               <small class="form-text text-muted">Inserisci nome utente</small>
            </div>
            <div class="form-group">
               <label for="surname">Cognome</label>
               <input type="text" class="form-control" name="surname">
               <small class="form-text text-muted">Inserisci cognome utente</small>
            </div>
            <div class="form-group">
               <label for="note">Ruolo</label>
               <select class="form-control" name="role">
               <option>  </option>
                  <option> ADMIN </option>
                  <option> USER </option>
               </select>
               <small class="form-text text-muted">Inserisci ruolo utente</small>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" pattern=".+@coffedev.com" value="@coffedev.com" class="form-control" name="email" >
               <small class="form-text text-muted">Inserisci email utente</small>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" name="password" >
               <small class="form-text text-muted">Inserisci password utente</small>
            </div>
            <div class="form-group">
               <label for="tel">Telefono</label>
               <input type="text" class="form-control" name="tel" >
               <small class="form-text text-muted">Inserire numero telefono</small>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{ URL::action('UserController@index') }}" onclick="return confirm('Inserimento non confermato, sicuro di voler uscire?');" class="btn btn-secondary">Indietro</a>
         </form>

   </body>
   </div>
</html>