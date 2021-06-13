@extends('layouts.sito')
@section('content')

<h1> Gestione Assegnazioni </h1>
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

<div class="form-group">
	<div class="col-md-2 float-right">
		<a href="{{ URL::action('AssignmentController@create') }}" id="add-class-btn" class="btn btn-outline-primary">Crea una nuova assegnazione</a>
		<div class="row top-buffer"></div>
	</div>
	<table id="categories-table" class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Nome Progetto</th>
				<th scope="col">Utenti</th>
				<th scope="col">Descrizione</th>
				<th scope="col">Registrato</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody id="filtro">
		<input type="text" class="form-control mb-3" id="myInput" placeholder="Filtra per Progetto, per Nome/Cognome Utente o Data" title="Type in a name">
		@foreach($assignments->reverse() as $a)
		<tr>
			<th scope="row">{{ $a->project->name }}</th>
			<td>{{ $a->user->name }} {{ $a->user->surname }}</td>
			<td>{{ $a->description }}</td>
			<th scope="row">{{ date('d/m/Y', strtotime($a->begins)) }}</th>
			<td>
				<a href="{{ URL::action('AssignmentController@destroy', $a) }}" onclick="return confirm('Confermare la cancellazione?');" class="btn btn-danger">Cancella</a>
			</td>
		</tr>
		@endforeach
	</table>
</div>


<script type="application/javascript">
   $(document).ready(function(){
      $("#add-class-btn").on("keyup",function () {
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
@endsection
