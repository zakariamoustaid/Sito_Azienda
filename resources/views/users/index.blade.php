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
   <div class="container">
   <body class="mybody">
      <div id="app">
         <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <a class="navbar-brand">
            {{ config('app.name', 'Laravel') }}
            </a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link" href="/admin">Home</a><span class="sr-only">(current)</span></a></li>
                  <li class="nav-item"><a class="nav-link" href=""><b>Gestione Utenti</b></a><span class="sr-only">(current)</span></a></li>
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

    <h1> Lista Utenti </h1>
    @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
    @endif
    @if (session('no'))
    <div class="alert alert-danger" >
        {{ session('no') }}
    </div>
   @endif

    <a href="{{ URL::action('UserController@create') }}" class="btn btn-primary float-md-right mb-2">Inserimento Utente</a>
    <a href="{{ URL::action('UserController@show_terminated') }}" class="btn btn-outline-secondary btn-sm">Visualizza Contratti Conclusi</a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Ruolo</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;    
            foreach($users as $u){?>
            <?php if ($u->in_corso != 'no') {?>
            <?php echo '<tr>'; ?>
            <?php echo '<td>'.$i.'</td>'; ?>
            <?php echo '<td>'.$u->name.'</td>'; ?>
            <?php echo '<td>'.$u->surname.'</td>'; ?>
            <?php echo '<td>'.$u->email.'</td>'; ?>
            <?php echo '<td>'.$u->tel.'</td>'; ?>
            <?php echo '<td>'.$u->role.'</td>'; ?>
            <td><a href="{{ URL::action('UserController@edit', $u) }}" class="btn btn-outline-primary btn-sm"> Modifica</a></td>
            <?php echo '</tr>'; ?>
            <?php }; $i++; ?>
         <?php } ?>
        </tbody>
      </table>

</div>

   </body>
   </div>
</html>
