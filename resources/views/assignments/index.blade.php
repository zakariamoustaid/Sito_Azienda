@extends('layouts.sito')
@section('content')

<div class="container">
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
					<th scope="col">Registrato</th>
					<th scope="col">Nome Progetto</th>
					<th scope="col">Utenti</th>
					<th scope="col">Descrizione</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>

          @foreach($assignments as $a)
          
				<tr>
					<th scope="row">{{ date('d/m/Y', strtotime($a->begins)) }}</th>
					<td>{{ $a->project->name }} </td>
					<td>{{ $a->user->name }} {{ $a->user->surname }}</td>
					<td>{{ $a->description }}</td>
					<td>
						<a href="{{ URL::action('AssignmentController@destroy', $a) }}" onclick="return confirm('Confermare la cancellazione?');" class="btn btn-danger">Cancella</a>
					</td>
				</tr>
          @endforeach

      
			</table>
	</div>
</div>
@endsection
