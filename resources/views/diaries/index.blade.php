@extends('layouts.sito')
@section('content')


<!-- modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header" id="header_riepilogo">
            <h5 class="modal-title">Scheda Ore</h5>
            <button type="button" class="close" id="close_x" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div id="ore" class="modal-body">
         <div id="test">
            <h4> Totale ore spese: <strong>{{ $ind }} </strong></h4>
            <div class="row top-buffer"></div>
            <?php foreach($projects as $p){?>
            <?php $d = DB::table('diaries') -> where('project_id', $p->id) ->where('user_id', Auth::user()->id) -> first(); if ($d != null) {?>
            <?php echo '<h5>'.$p->name.':</h5>';?>
            <?php $somma = DB::table('diaries') ->select('hours') ->where('project_id', $p->id) ->where('user_id', Auth::user()->id) -> sum('hours');?>
            <?php echo '<h5><strong>'.$somma.'</strong></h5>'; } }?>
         </div>
            <button type="button" class="btn btn-outline-secondary float-md-right" id="close" data-dismiss="modal">Chiudi</button>
            <div class="row top-buffer"></div>
         </div>
      </div>
   </div>
</div>
<!-- end modal -->

<div class="form-row">
<h3 id="titolo_scheda"> Inserimento Scheda</h3>
<button id="bottone_chiusura" type="button" class="btn btn-outline-secondary float-md-right btn-sm" style="margin:2px" id="apri_scheda">Chiudi </button>
</div>

<!-- ALERT -->
<div id="warning_ins" class="alert alert-warning">
   <p> Compilare con attenzione. La scheda, una volta salvata, non potrà essere modificata. </p>
</div>

<div id="error_div" class="alert alert-danger">
   <p> Errore nell'inserimento. </p>
</div>
<div id="error_hours" class="alert alert-danger">
   <p> Errore nell'inserimento, controllare i dati inseriti. </p>
</div>

<div id="error_hours_day" class="alert alert-danger">
   <p> Attenzione, da contratto non è possibile effettuare più di 8 ore lavorative al giorno! </p>
</div>
<div id="ins_ok" class="alert alert-success">
   <p> Inserimento confermato. </p>
</div>
<!-- FINE ALERT -->

<!-- Inserimento -->
<div class="row top-buffer"></div>

<div id="inserimento_scheda" class="form-row">
   <div id="data_scheda" class="form-group col-md-2">
         <input type="date" value="<?php echo date('Y-m-d'); ?>" id="today" class="form-control" name="today" >
         <small class="form-text text-muted">*Inserisci la data</small>
   </div>
   <div id="progetto_scheda" class="form-group col-md-4">
         <select class="form-control" name="project_id" id="project_id">
            @foreach ($assignments as $a)
            @if($a->user_id == Auth::user()->id)
            <option value="{{ $a->project_id }}">{{ $a->project->name }}</option>
            @endif
            @endforeach
         </select>
         <small class="form-text text-muted">*Seleziona Progetto</small>
   </div>
   <div id="ore_scheda" class="form-group col-md-1">
         <input type="number" class="form-control" id="hours" name="hours" >
         <small class="form-text text-muted">*Inserisci ore</small>
   </div>
   <div id="note_scheda" class="form-group col-md-4">
         <input type="text" class="form-control" id="notes" name="notes" >
         <small class="form-text text-muted">Inserisci eventuali note</small>
   </div>
   <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
   <a id="add-diary" class="btn btn-primary float-md-right mb-5" data-id="{{ Auth::user()->id }}">Salva</a>
</div>

<!-- DIARIO -->
<div class="container">
   <div class="form-group">
      <h2>Diario Utente </h2>
      <button type="button" class="btn btn-outline-primary float-md-right" style="margin:5px" id="apri_scheda">Inserimento nuova scheda </button>
      <button type="button" class="btn btn-outline-secondary float-md-right" data-toggle="modal" style="margin:5px" data-target="#exampleModalCenter" id="apri_modal">Visualizza riepilogo ore </button>
   </div>
   <div class="row top-buffer"></div>
   <div class="row top-buffer"></div>
      <input type="text" class="form-control mb-3" id="myInput" placeholder="Filtra per Mese o Progetto" title="Type in a name">
      <table id="diary-table" class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Data scheda</th>
               <th scope="col">Progetto</th>
               <th scope="col">Ore Spese</th>
               <th scope="col">Note</th>
            </tr>
         </thead>
         <tbody id="filtro">
            @foreach($diaries->reverse() as $d)
            <tr>
               @if($d->user->id == Auth::user()->id)
               <td scope="row">{{ date('d/m/Y', strtotime($d->today)) }}</th>
               <td>{{ $d->project->name }} </td>
               <td>{{ $d->hours }}</td>
               <td>{{ $d->notes }}</td>
               <!--<td><a href="{{ URL::action('DiaryController@destroy', $d) }}" id="delete-btn" class="btn btn-danger">Cancella</a></td>-->
               @endif
            </tr>
            @endforeach
         </tbody>
      </table>
</div>
</div>

<script>
   $(document).ready(function(){
      $("#add-diary").on("keyup",function () {
         $('[data-toggle="popover"]').popover()
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
      $('#apri_scheda').bind('click', function(e){
          e.preventDefault();
          $('#titolo_scheda').css('display', 'block');
          $('#bottone_chiusura').css('display', 'block');
          $('#data_scheda').css('display', 'block');
          $('#progetto_scheda').css('display', 'block');
          $('#ore_scheda').css('display', 'block');
          $('#note_scheda').css('display', 'block');
          $('#add-diary').css('display', 'block');
          $('#warning_ins').css('display', 'block');
      });

      $('#bottone_chiusura').bind('click', function(e){
          e.preventDefault();
          $('#titolo_scheda').css('display', 'none');
          $('#bottone_chiusura').css('display', 'none');
          $('#data_scheda').css('display', 'none');
          $('#progetto_scheda').css('display', 'none');
          $('#ore_scheda').css('display', 'none');
          $('#note_scheda').css('display', 'none');
          $('#add-diary').css('display', 'none');
          $('#warning_ins').css('display', 'none');
      });

      $('#add-diary').bind('click', function(e){
         e.preventDefault();

      var today = $('#today').val();
      var project_id = $('#project_id').val();
      var hours = $('#hours').val();
      var notes = $('#notes').val();
      var user_id = $(this).attr('data-id'); 
      var _token = $('#_token').val();
      console.log(today,project_id,hours,notes, user_id);
      if(hours <= 8 && hours > 0)
      {
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
                     var newColn= $('<td/>', { text: data.diaries.notes });
                     /*var delAction = $('<a/>', {
                           href: "#",
                           id: "delete-btn",
                           "data-id": data.diaries.id,
                           class: "btn btn-danger",
                           text: 'Cancella',
                           });
                     var newColAction2 = $('<td/>').append(delAction);*/
                           //.append(newColAction2)
                     var newRow = $('<tr/>').append(newColt).append(newColp).append(newColh).append(newColn);
                     $('#diary-table').prepend  (newRow);
                     $('#ins_ok').css('display', 'block').fadeOut(5000);
                     var hours = $('#hours').val('');
                     var notes = $('#notes').val('');
                  }
                  else if(data.status == 'no')
                  {
                     $('#error_hours_day').css('display', 'block').fadeOut(10000);
                     var hours = $('#hours').val('');
                     var notes = $('#notes').val('');
                  }
                  }, 
                  error: function(response, stato) {
                     $('#error_div').css('display', 'block').fadeOut(5000);
                     var hours = $('#hours').val('');
                     var notes = $('#notes').val('');
                  }
            });
      }
      else{
            $('#error_hours').css('display', 'block').fadeOut(5000);
            var hours = $('#hours').val('');
            var notes = $('#notes').val('');
      }
      });
      $(document).on("click", "#apri_modal", function () {
         $('#exampleModalCenter').css('display', 'block');
         $("#test").load(location.href + " #test");
         
         $('#close').bind('click', function(e){
               $('#exampleModalCenter').css('display', 'none');
         });
         $('#close_x').bind('click', function(e){
               $('#exampleModalCenter').css('display', 'none');
         });

         $("#viewH").bind('click', function(){
            var project = $('#project_modal').val();
               console.log(project);
            });
      });
   });
})(jQuery);
</script>

@endsection