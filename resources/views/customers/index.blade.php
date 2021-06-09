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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .top-buffer { margin-top:25px; }
        .alert-danger { display:none;}
        .alert-success {display:none;}
        .modal {display:none;}
      </style>

    <!-- inserisco css personali -->
    <!-- css Diario User -->
    <link href="{{ asset('css/diary.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    
</head>
<div class="container">
<body class="mybody">
    <div id="app">
    <!-- NAVBAR -->
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
                        <a class="nav-link" href=""><b>Gestione Clienti</b></a>  <span class="sr-only">(current)</span></a>
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
<!-- MODAL TEST -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifica Dati Cliente</h5>
        <button type="button" id="close_x" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="ragione_sociale">Nome Societ&agrave</label>
          <input type="text" id="ragione_s" class="form-control" name="ragione_sociale" value="" disabled>
          <small class="form-text text-muted">Inserisci ragione sociale</small>
        </div>

        <div class="form-group">
            <label for="name_ref">Nome Referente</label>
            <input type="text" id="nome" class="form-control" name="name_ref" value="" disabled>
            <small class="form-text text-muted">Inserisci il nome</small>
        </div>

        <div class="form-group">
            <label for="surname_ref">Cognome Referente</label>
            <input type="text" id="cognome" class="form-control" name="surname_ref" value="" disabled >
            <small class="form-text text-muted">Inserisci il cognome</small>
        </div>

        <div class="form-group">
            <label for="email_ref">Email Referente</label>
            <input type="text" id="email" data-email-s="input" class="form-control" name="email_ref" value="">
            <small class="form-text text-muted">Inserisci la mail</small>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <button type="button" id="save" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->

    <h1> Gestione Clienti </h1>
        <!-- ALERT -->
        <div id="error_div" class="alert alert-danger">
            <p> Errore nell'inserimento, assicurarsi di aver inserito tutti i dati correttamente</p>
        </div>
        <div id="ins_ok" class="alert alert-success">
            <p> Inserimento confermato </p>
        </div>
        <div id="del_ok" class="alert alert-success">
            <p> Eliminazione confermata </p>
        </div>
        <div id="mod_ok" class="alert alert-success">
            <p> Modifica confermata </p>
        </div>
        <!-- FINE ALERT -->
        
<!-- INSERIMENTO -->
<form action="{{ URL::action('CustomerController@store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-5">
                <input type="text" class="form-control" name="name_ref" placeholder="Nome Referente" id="name_ref">
            </div>
            <div class="form-group col-md-5">
                <input type="text" class="form-control" name="surname_ref" placeholder="Cognome Referente" id="surname_ref" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <input type="text" class="form-control" name="ragione_sociale"  placeholder="Nome Società" id="ragione_sociale" >
            </div>
            <div class="form-group col-md-5">
                <input type="text" class="form-control" name="email_ref" placeholder="Email Referente" id="email_ref">
            </div>
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <a href="" id="add-class-btn" class="btn btn-primary float-md-right mb-2" onclick="return confirm('Confermare inserimento?');">Aggiungi</a>
        </div>
       
</form>    
    <div class="row top-buffer">
    </div>
    
<!-- ELENCO -->
    <h4>Lista Clienti</h4>
    <table id="customers-table" class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Ragione Sociale</th>
            <th scope="col">Nome Referente</th>
            <th scope="col">Cognome Referente</th>
            <th id="email_l" scope="col">Email</th>
          </tr>
        </thead>
        <tbody>

          @foreach($customers as $c)
          <tr>
            <td>{{ $c->ragione_sociale }} </td>
            <td>{{ $c->name_ref }}</td>
            <td>{{ $c->surname_ref }}</td>
            <td>{{ $c->email_ref }}</td>
            <td><a href="" class="btn btn-outline-secondary" id="edit-class-btn" data-rag="{{ $c->ragione_sociale }}" data-id="{{ $c->id }}"
                    data-nom="{{ $c->name_ref }}" data-sur="{{ $c->surname_ref }}" data-email="{{ $c->email_ref }}">Modifica</a>
            </td>
            <td>
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <a href="" class="btn btn-outline-danger" id="delete-btn" data-id="{{ $c }}">Elimina Cliente</a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
</div>

</body>
</div>
</html>

<script type="text/javascript">
(function($) {
   $('document').ready(function(){
      $('#add-class-btn').bind('click', function(e){
         e.preventDefault();

         var ragione_sociale = $('#ragione_sociale').val();
         var name_ref = $('#name_ref').val();
         var surname_ref = $('#surname_ref').val();
         var email_ref = $('#email_ref').val();
         var _token = $('#_token').val();

      $.ajax({
         url: "/customers", 
         type: "POST",
         dataType: "json",
         data: { 'ragione_sociale': ragione_sociale, 'name_ref': name_ref, 'surname_ref': surname_ref, 'email_ref': email_ref, '_token': _token},
         success: function(data) {                        
               if (data.status === 'ok') {
                    var newColr = $('<td/>', { text: data.customers.ragione_sociale });
                    var newColn = $('<td/>', { text: data.customers.name_ref });
                    var newCols= $('<td/>', { text: data.customers.surname_ref});
                    var newCole = $('<td/>', { text: data.customers.email_ref });

                    var editAction = $('<a/>', {
                                href: "/customers/"+data.customers.id+"/edit",
                                text: 'Modifica',
                                class: "btn btn-outline-secondary",
                                "data-id": data.customers.id
                            });
                    var delAction = $('<a/>', {
                        href: "#",
                        id: "delete-btn",
                        "data-id": data.customers.id,
                        class: "btn btn-outline-danger",
                        text: 'Elimina Cliente',
                        onclick: "return confirm('Confermare eliminazione?');"
                        });
                    var newColAction = $('<td/>').append(editAction);
                    var newColAction2 = $('<td/>').append(delAction);

                  var newRow = $('<tr/>').append(newColr).append(newColn).append(newCols).append(newCole).append(newColAction).append(newColAction2);
                  $('#customers-table').append(newRow);

                var ragione_sociale = $('#ragione_sociale').val('');
                var name_ref = $('#name_ref').val('');
                var surname_ref = $('#surname_ref').val('');
                var email_ref = $('#email_ref').val('');
                $('#ins_ok').css('display', 'block').fadeOut(2000);
               }
               }, 
               error: function(response, stato) {
                  console.log(stato);
                  $('#error_div').css('display', 'block').fadeOut(5000);
               }
         });
      });

      $(document).on("click", "a#edit-class-btn", function () {
            $('.modal').css('display', 'block');

            $('#close').bind('click', function(e){
                $('.modal').css('display', 'none');
                window.location.reload(false);  
            });
            $('#close_x').bind('click', function(e){
                $('.modal').css('display', 'none');
                window.location.reload(false);  
            });

            var rag_s = $(this).attr('data-rag');
            var name = $(this).attr('data-nom');
            var sur = $(this).attr('data-sur');
            var email = $(this).attr('data-email');
            var customer_id = $(this).attr('data-id');
            var _token = $('#_token').val(); 
            console.log(email);
            $(".modal-body #ragione_s").val( rag_s );
            $(".modal-body #nome").val( name );
            $(".modal-body #cognome").val( sur );
            $(".modal-body #email").val( email );



            $('#save').bind('click', function(e){
                var email_new = $('#email').val();
                console.log(customer_id);
                $.ajax({
                        url: "/customers/" + customer_id +"/edit",     
                        type: "GET",                     
                        dataType: "json",  
                        data: { 'email_new': email_new, 'customer_id': customer_id, '_token': _token},
                        success: function(data) {                        
                            if (data.status === 'ok') {
                                window.location.reload(false);        
                            }
                        }, 
                        error: function(response, stato) {
                            console.log(stato);
                        }
                    });
                $('.modal').css('display', 'none');
            });


        });

      $('#delete-btn').bind('click', function(e) {
            e.preventDefault();
            console.log('ciao');
            var row = $(this).parents('tr');            
            var customerId = $(this).attr('data-id');   
            var _token = $('#_token').val();  
            console.log(customerId);   
            $.ajax({
                    url: "/customers/" + customerId + "/delete",     
                    type: "GET",                     
                    dataType: "json",  
                    data: { 'customer': customerId, '_token': _token }, 
                    success: function(data) {                        
                        if (data.status === 'ok') {
                            $(row).remove();
                            $('#del_ok').css('display', 'block').fadeOut(2000);          
                        }
                    }, 
                    error: function(response, stato) {
                        console.log(stato);
                    }
                });
        });
   });
})(jQuery);
</script>