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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <style>
        .top-buffer { margin-top:25px; }
        .alert-danger { display:none;}
        .alert-success {display:none;}
      </style>
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
                     <a class="nav-link" href="{{ URL::action('DiaryController@index') }}"> Visualizza Attività </a>  <span class="sr-only">(current)</span></a>
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
        <h3> Inserimento Scheda</h3>

        <!-- ALERT -->
        <div id="error_div" class="alert alert-danger">
            <p1> Errore nell'inserimento </p1>
        </div>
        <div id="ins_ok" class="alert alert-success">
            <p1> Inserimento confermato </p1>
        </div>
        <!-- FINE ALERT -->

        <div class="row top-buffer"></div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="date" value="<?php echo date('Y-m-d'); ?>" id="today" class="form-control" name="today" >
                <small class="form-text text-muted">Inserisci la data</small>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="project_id" id="project_id">
                    @foreach ($assignments as $a)
                    @if($a->user_id == Auth::user()->id)
                    <option value="{{ $a->project_id }}">{{ $a->project->name }}</option>
                    @endif
                    @endforeach
                </select>
                <small class="form-text text-muted">Seleziona Progetto</small>
            </div>
            <div class="form-group col-md-1">
                <input type="number" class="form-control" id="hours" name="hours" >
                <small class="form-text text-muted">Inserisci ore</small>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="notes" name="notes" >
                <small class="form-text text-muted">Inserisci eventuali note</small>
            </div>
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <a id="add-diary" class="btn btn-primary float-md-right mb-5" data-id="{{ Auth::user()->id }}">Salva</a>
        </div>
 
        <div class="row top-buffer"></div>

      <div class="container">
         <h3>Lista Schede </h3>
         <table id="diary-table" class="table table-striped">
            <thead>
               <tr>
                  <th scope="col">Data scheda</th>
                  <th scope="col">Progetto</th>
                  <th scope="col">Ore Spese</th>
               </tr>
            </thead>
            <tbody>
               @foreach($diaries as $d)
               <tr>
                  @if($d->user->id == Auth::user()->id)
                  <td scope="row">{{ date('d/m/Y', strtotime($d->today)) }}</th>
                  <td>{{ $d->project->name }} </td>
                  <td>{{ $d->hours }}</td>
                  <td><a href="{{ URL::action('DiaryController@destroy', $d) }}" id="delete-btn" class="btn btn-danger">Cancella</a></td>
                  @endif
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </body>
</html>

<script type="text/javascript">
(function($) {
   $('document').ready(function(){
      $('#add-diary').bind('click', function(e){
         e.preventDefault();

         var today = $('#today').val();
         var project_id = $('#project_id').val();
         var hours = $('#hours').val();
         var notes = $('#notes').val();
         var user_id = $(this).attr('data-id'); 
         var _token = $('#_token').val();

         console.log(today,project_id,hours,notes, user_id);
      $.ajax({
         url: "/diaries", 
         type: "POST",
         dataType: "json",
         data: { 'today': today, 'notes': notes,'hours': hours, 'project_id': project_id, 'user_id': user_id, '_token': _token},
         success: function(data) {                        
               if (data.status === 'ok') {
                    var newColt = $('<td/>', { text: data.d });
                    var newColp = $('<td/>', { text: data.p });
                    var newColh= $('<td/>', { text: data.h });
                    var delAction = $('<a/>', {
                        href: "#",
                        id: "delete-btn",
                        "data-id": data.diaries.id,
                        class: "btn btn-danger",
                        text: 'Cancella',
                        });
                    var newColAction2 = $('<td/>').append(delAction);

                  var newRow = $('<tr/>').append(newColt).append(newColp).append(newColh).append(newColAction2);
                  $('#diary-table').append(newRow);
                  $('#ins_ok').css('display', 'block').fadeOut(2000);
                  var hours = $('#hours').val('');
                  var notes = $('#notes').val('');
               }
               }, 
               error: function(response, stato) {
                  console.log('errore cavolfiore');
                  $('#error_div').css('display', 'block').fadeOut(2000);
                  var hours = $('#hours').val('');
                  var notes = $('#notes').val('');
               }
         });
      });
   });
})(jQuery);
</script>