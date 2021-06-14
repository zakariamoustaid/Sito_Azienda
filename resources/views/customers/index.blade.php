@extends('layouts.sito')
@section('content')

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
        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <button type="button" id="save" class="btn btn-primary"> Conferma modifica</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->

    <!-- ALERT -->
<div class="form-row">
<h3 id="titolo_scheda_c"> Inserimento Clienti </h3>
<button id="bottone_chiusura_c" type="button" class="btn btn-outline-secondary float-md-right btn-sm" style="margin:2px" id="apri_scheda">Chiudi </button>
</div>
    <!-- ALERT -->
    <div id="error_div" class="alert alert-danger">
        <p> Errore nell'inserimento, assicurarsi di aver inserito tutti i dati correttamente.</p>
    </div>
    <div id="error_email" class="alert alert-danger">
        <p> Formato email non corretto.</p>
    </div>
    <div id="ins_ok" class="alert alert-success">
        <p> Inserimento confermato. </p>
    </div>
    <div id="del_ok" class="alert alert-success">
        <p> Operazione confermata. </p>
    </div>
    <div id="del_no" class="alert alert-danger">
        <p> Non è possibile terminare il rapporto, ci sono ancora progetti in corso! </p>
    </div>
    <div id="mod_ok" class="alert alert-success">
        <p> Modifica confermata. </p>
    </div>
    <!-- FINE ALERT -->
        
<!-- INSERIMENTO -->
<form action="{{ URL::action('CustomerController@store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row">
            <div id="inserimento_nome_ref" class="form-group col-md-5">
                <input type="text" class="form-control" name="name_ref" placeholder="*Nome Referente" id="name_ref">
            </div>
            <div id="inserimento_cognome_ref" class="form-group col-md-5">
                <input type="text" class="form-control" name="surname_ref" placeholder="*Cognome Referente" id="surname_ref" >
            </div>
        </div>
        <div class="form-row">
            <div id="inserimento_nome_soc" class="form-group col-md-5">
                <input type="text" class="form-control" name="ragione_sociale"  placeholder="*Nome Società" id="ragione_sociale" >
            </div>
            <div id="inserimento_email" class="form-group col-md-5">
                <input type="email" class="form-control" name="email_ref" placeholder="*Email Referente" pattern="[^ @]*@[^ @]*" id="email_ref">
            </div>
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        </div>
        <a href="" id="add-class-btn_c" class="btn btn-outline-primary float-md-right mb-3">Conferma inserimento</a>
       
</form>    
    <div class="row top-buffer"></div>
    
<!-- ELENCO -->
    <h2>Lista Clienti</h2>
    <a class="btn btn-outline-primary float-md-right" id="apri_scheda_c" style="margin:5px">Scheda inserimento</a>
    <a href="{{ URL::action('CustomerController@show_terminated') }}" class="btn btn-outline-secondary  float-md-right" style="margin:5px">Visualizza Rapporti Conclusi</a>
    <div class="row top-buffer"></div>
    <table id="customers-table" class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Ragione Sociale</th>
            <th scope="col">Nome Referente</th>
            <th scope="col">Cognome Referente</th>
            <th id="email_l" scope="col">Email</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody id="filtro">
        <input type="text" class="form-control mb-3" id="myInput" placeholder="Filtra per Ragione Sociale, Nome/Cognome Cliente o Email">
          @foreach($customers as $c)
          @if($c->finito == 'no')
          <tr>
            <td><strong>{{ $c->ragione_sociale }} </strong></td>
            <td>{{ $c->name_ref }}</td>
            <td>{{ $c->surname_ref }}</td>
            <td id="email_update">{{ $c->email_ref }}</td>
            <td><a class="btn btn-outline-secondary" id="edit-class-btn" data-rag="{{ $c->ragione_sociale }}" data-id="{{ $c->id }}"
                    data-nom="{{ $c->name_ref }}" data-sur="{{ $c->surname_ref }}" data-email="{{ $c->email_ref }}">Modifica</a>
            </td>
            <td>
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <a class="btn btn-outline-danger" id="delete-btn" data-id="{{ $c->id }}">Termina Rapporto</a>
            </td>
          </tr>
          @endif
          @endforeach

        </tbody>
      </table>
</div>

<script type="application/javascript">
   $(document).ready(function(){
      $("#customers-table").on("keyup",function () {
         //$('[data-toggle="popover"]').popover()
      });
      
      $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
	  if(value == 'gennaio')
         value = '/01';
      else if(value == 'febbraio')
         value = '/02';
      else if(value == 'marzo')
         value = '/03';
      else if(value == 'aprile')
         value = '/04';
      else if(value == 'maggio')
         value = '/05';
      else if(value == 'giugno')
         value = '/06';
      else if(value == 'luglio')
         value = '/07';
      else if(value == 'agosto')
         value = '/08';
      else if(value == 'settembre')
         value = '/09';
      else if(value == 'ottobre')
         value = '/10';
      else if(value == 'novembre')
         value = '/11';
      else if(value == 'dicembre')
         value = '/12';
      $("#filtro tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
   });
});
</script>


<script type="text/javascript">
(function($) {
   $('document').ready(function(){
    $('#apri_scheda_c').bind('click', function(e){
          e.preventDefault();
          $('#titolo_scheda_c').css('display', 'block');
          $('#bottone_chiusura_c').css('display', 'block');
          $('#inserimento_nome_ref').css('display', 'block');
          $('#inserimento_cognome_ref').css('display', 'block');
          $('#inserimento_nome_soc').css('display', 'block');
          $('#inserimento_email').css('display', 'block');
          $('#add-class-btn_c').css('display', 'block');
      });

      $('#bottone_chiusura_c').bind('click', function(e){
          e.preventDefault();
          $('#titolo_scheda_c').css('display', 'none');
          $('#bottone_chiusura_c').css('display', 'none');
          $('#inserimento_nome_ref').css('display', 'none');
          $('#inserimento_cognome_ref').css('display', 'none');
          $('#inserimento_nome_soc').css('display', 'none');
          $('#inserimento_email').css('display', 'none');
          $('#add-class-btn_c').css('display', 'none');
      });

        $(document).on("click", "#add-class-btn_c", function (e){
            if(confirm('Confermare inserimento?'))
            {
                e.preventDefault();

                var ragione_sociale = $('#ragione_sociale').val();
                var name_ref = $('#name_ref').val();
                var surname_ref = $('#surname_ref').val();
                var email_ref = $('#email_ref').val();
                var _token = $('#_token').val();
                
                var check_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email_ref);

                if(ragione_sociale == "" || name_ref == "" || surname_ref == "" || email_ref == "")
                {
                    $('#error_div').css('display', 'block').fadeOut(6000);
                    var ragione_sociale = $('#ragione_sociale').val('');
                    var name_ref = $('#name_ref').val('');
                    var surname_ref = $('#surname_ref').val('');
                    var email_ref = $('#email_ref').val('');
                }
                if(!check_email)
                {
                    $('#error_email').css('display', 'block').fadeOut(6000);
                    var ragione_sociale = $('#ragione_sociale').val('');
                    var name_ref = $('#name_ref').val('');
                    var surname_ref = $('#surname_ref').val('');
                    var email_ref = $('#email_ref').val('');
                }

                else{
                    $.ajax({
                    url: "/customers", 
                    type: "POST",
                    dataType: "json",
                    data: { 'ragione_sociale': ragione_sociale, 'name_ref': name_ref, 'surname_ref': surname_ref, 'email_ref': email_ref, '_token': _token},
                    success: function(data) {                        
                        if (data.status === 'ok') {
                                var newColr = $('<td/>', { text: data.customers.ragione_sociale }).css('font-weight','bold');;
                                var newColn = $('<td/>', { text: data.customers.name_ref });
                                var newCols= $('<td/>', { text: data.customers.surname_ref});
                                var newCole = $('<td/>', { text: data.customers.email_ref });

                                var editAction = $('<a/>', {
                                            text: 'Modifica',
                                            class: "btn btn-outline-secondary",
                                            id: "edit-class-btn",
                                            "data-id": data.customers.id,
                                            "data-email": data.customers.email_ref,
                                            "data-sur": data.customers.surname_ref,
                                            "data-nom": data.customers.name_ref,
                                            "data-rag": data.customers.ragione_sociale
                                        });
                                 var delAction = $('<a/>', {
                                    href: "#",
                                    id: "delete-btn",
                                    "data-id": data.customers.id,
                                    class: "btn btn-outline-danger",
                                    text: 'Termina Rapporto',
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
                            $('#ins_ok').css('display', 'block').fadeOut(6000);
                        }
                        }, 
                        error: function(response, stato) {
                            console.log(stato);
                            $('#error_div').css('display', 'block').fadeOut(6000);
                        }
                    });
                }
            }
      });

      $(document).on("click", "a#edit-class-btn", function (e) {
            e.preventDefault();
            $('.modal').css('display', 'block');

            $('#close').bind('click', function(e){
                e.preventDefault();
                $('.modal').css('display', 'none');
                window.location.reload(false);  
            });
            $('#close_x').bind('click', function(e){
                e.preventDefault();
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



            $(document).off("click", "#save").on("click", "#save", function (e) {
                e.preventDefault();
                if (confirm('Confermare la modifica?')) {
                    var email_new = $('#email').val();
                        if(email_new == '')
                        {
                            $('#error_div').css('display', 'block').fadeOut(5000);
                        }
                        else {
                            $.ajax({
                                    url: "/customers/" + customer_id +"/edit",     
                                    type: "GET",                     
                                    dataType: "json",  
                                    data: { 'email_new': email_new, 'customer_id': customer_id, '_token': _token},
                                    success: function(data) {                        
                                        if (data.status === 'ok') {
                                            alert('modifica confermata!');
                                            window.location.reload(false);
                                            //alert('ok');
                                            //$('#mod_ok ').css('display', 'block').fadeOut(3000);
                                            //$("#email_update"+$(this).attr("id")).text(email_new);
                                        }
                                    }, 
                                    error: function(response, stato) {
                                        console.log(stato);
                                    }
                                });
                    }
                } 
                $('.modal').css('display', 'none');
            });
        });

        $(document).on("click", "#delete-btn", function (e){
            e.preventDefault();
            if (confirm('Richiesta terminazione contratto, confermare operazione?'))
            {
                var row = $(this).parents('tr');            
                const customerId = $(this).attr('data-id');   
                var _token = $('#_token').val();  
                //customer.forEach(element => console.log(element[id]));  
                $.ajax({
                        url: "/customers/" + customerId + "/delete",     
                        type: "GET",                     
                        dataType: "json",  
                        data: { 'customerId': customerId, '_token': _token }, 
                        success: function(data) {                        
                            if (data.status === 'ok') {
                                $(row).remove();
                                $('#del_ok').css('display', 'block').fadeOut(3000);          
                            }
                            else if (data.status === 'no')
                            {
                                $('#del_no').css('display', 'block').fadeOut(3000);
                            }
                        }, 
                        error: function(response, stato) {
                            console.log(stato);
                        }
                    });
            }
        });
   });
})(jQuery);
</script>

@endsection