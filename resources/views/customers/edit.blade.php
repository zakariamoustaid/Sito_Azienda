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
                  <li class="nav-item"><a class="nav-link" href=""><b>Gestione Cliente</b></a><span class="sr-only">(current)</span></a></li>
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

    <form action="{{ URL::action('CustomerController@update', $customer) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="ragione_sociale">Nome Societ&agrave</label>
          <input type="text" class="form-control" name="ragione_sociale" value="{{ $customer->ragione_sociale }}">
          <small class="form-text text-muted">Inserisci ragione sociale</small>
        </div>

        <div class="form-group">
            <label for="name_ref">Nome Referente</label>
            <input type="text" class="form-control" name="name_ref" value="{{ $customer->name_ref }}" disabled>
            <small class="form-text text-muted">Inserisci il nome</small>
        </div>

        <div class="form-group">
            <label for="surname_ref">Cognome Referente</label>
            <input type="text" class="form-control" name="surname_ref" value="{{ $customer->surname_ref }}" disabled >
            <small class="form-text text-muted">Inserisci il cognome</small>
        </div>

        <div class="form-group">
            <label for="email_ref">Email Referente</label>
            <input type="text" class="form-control" name="email_ref" value="{{ $customer->email_ref }}">
            <small class="form-text text-muted">Inserisci la mail</small>
        </div>
        

        <button type="submit" class="btn btn-primary">Aggiorna</button>


        <a href="{{ URL::action('CustomerController@index') }}" class="btn btn-secondary">Indietro</a>

    </form>    
</div>