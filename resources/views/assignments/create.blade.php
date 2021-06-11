@extends('layouts.sito')
@section('content')
<form action="{{ URL::action('AssignmentController@store') }}" method="POST">
{{ csrf_field() }}

   <h1> Assegna Progetti </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <div class="form-group">
      <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="begins">
      <small class="form-text text-muted">Data assegnazione</small>
   </div>
   <div class="form-row">
      <div class="form-group col-md-6">
            <select class="form-control" name="project_id">
               @foreach ($projects as $p)
               @if($p->finito != 'yes')
                  <option value="{{ $p->id }}">{{ $p->name }}</option>
               @endif
               @endforeach
            </select>
            <small class="form-text text-muted">Seleziona Progetto</small>
      </div>
      <div class="form-group col-md-4">
            <select id="choices-multiple-remove-button" class="form-control" name="user_id[]" multiple>
               @foreach ($users as $u)
               @if($u->role == 'USER' && $u->in_corso == 'yes')
                  <option value="{{ $u->id }}">{{ $u->surname }} {{ $u->name }}</option>
               @endif
               @endforeach
            </select>
            <small class="form-text text-muted">Seleziona Utenti</small>
      </div>
   </div>
   <div class="form-group">
      <label for="description">Inserisci una piccola descrizione</label>
      <input type="text" class="form-control" name="description" >
   </div>
   <button type="submit" onclick="return confirm('Confermare assegnazione?');" class="btn btn-primary">Assegna</button>
      <a href="{{ URL::action('AssignmentController@index') }}" onclick="return confirm('Modifiche non confermate, sicuro di voler uscire?');" class="btn btn-secondary">Indietro</a>
</div>

<script type="text/javascript">
(function($) {
   $(document).ready(function(){
      var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
      removeItemButton: true,
      });
   });
})(jQuery);
</script>
@endsection