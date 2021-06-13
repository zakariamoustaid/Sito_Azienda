@extends('layouts.sito')
@section('content')


<h1> Lista Progetti </h1>
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

<a href="{{ URL::action('ProjectController@create') }}" class="btn btn-outline-primary float-md-right">Inserisci un nuovo Progetto</a>
<a href="{{ URL::action('ProjectController@show_terminated') }}" class="btn btn-outline-dark">Visualizza Progetti terminati</a>
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

    <tbody>
        @foreach($projects->reverse() as $p)
        @if($p->finito != 'yes')
        <tr>
        <td><strong>{{ $p->name }}</strong> </td>
        <td>{{ $p->description }}</td>
        <td>{{ date('d/m/Y', strtotime($p->begins)) }}</th>
        <td>{{ $p->customer->ragione_sociale }}</td>
        <td><u>{{ $p->cost }}€</u></th>
        <td><a href="{{ URL::action('ProjectController@edit', $p) }}" class="btn btn-outline-dark">Modifica</a></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

@endsection