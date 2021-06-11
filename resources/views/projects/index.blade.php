@extends('layouts.sito')
@section('content')


<h1> Tutte i Progetti </h1>
@if (session('alert'))
<div class="alert alert-success">
    {{ session('alert') }}
</div>
@endif

<a href="{{ URL::action('ProjectController@create') }}" class="btn btn-outline-primary float-md-right">Inserisci un nuovo Progetto</a>
<a href="{{ URL::action('ProjectController@show_terminated') }}" class="btn btn-outline-dark">Visualizza Progetti terminati</a>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">Registrato</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Cliente</th>
        <th scope="col">Costo Orario</th>
        <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        @foreach($projects as $p)
        @if($p->terminated != 'yes')
        <tr>
        <td>{{ $p->name }} </td>
        <td>{{ date('d/m/Y', strtotime($p->begins)) }}</th>
        <td>{{ $p->description }}</td>
        <td>{{ $p->customer->ragione_sociale }}</td>
        <th scope="row">{{ $p->cost }}€</th>
        <td><a href="{{ URL::action('ProjectController@edit', $p) }}" class="btn btn-outline-dark">Modifica</a></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

@endsection