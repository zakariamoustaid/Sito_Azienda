@extends('layouts.sito')
@section('content')


<h1> Progetti in corso </h1>
@if (session('alert'))
<div class="alert alert-success">
    {{ session('alert') }}
</div>
@endif

@if (session('no'))
<div class="alert alert-danger">
    {{ session('no') }}
</div>
@endif

<a href="{{ URL::action('ProjectController@create') }}" id="add-class-btn" class="btn btn-outline-primary float-md-right">Inserisci un nuovo Progetto</a>
<a href="{{ URL::action('ProjectController@show_terminated') }}" class="btn btn-outline-secondary">Visualizza Progetti terminati</a>
<div class="row top-buffer"></div>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Registrato</th>
        <th scope="col">Cliente</th>
        <th scope="col">Costo Orario</th>
        <th scope="col"></th>
        </tr>
    </thead>

    <tbody id="filtro">
        <input type="text" class="form-control mb-3" id="myInput" placeholder="Filtra per Progetto, Cliente o Data">
        @foreach($projects->reverse() as $p)
        @if($p->finito != 'yes')
        <tr>
        <td><strong>{{ $p->name }}</strong> </td>
        <td>{{ $p->description }}</td>
        <td>{{ date('d/m/Y', strtotime($p->begins)) }}</th>
        <td>{{ $p->customer->ragione_sociale }}</td>
        <td><u>{{ $p->cost }}€</u></th>
        <td><a href="{{ URL::action('ProjectController@edit', $p) }}" class="btn btn-outline-dark">Modifica</a></td>
        <td><a href="{{ URL::action('ProjectController@terminate', $p) }}" class="btn btn-outline-danger" onclick="return confirm('Confermare la terminazione? Se sono presenti assegnazioni esse verranno eliminate!');">Termina Progetto</a></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<script type="application/javascript">
   $(document).ready(function(){
      $("#add-class-btn").on("keyup",function () {
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

@endsection