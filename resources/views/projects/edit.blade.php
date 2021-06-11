@extends('layouts.sito')
@section('content')

<h1> Modifica Assegnazioni </h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ URL::action('ProjectController@update', $project) }}" method="POST">
    <input type="hidden" name="_method" value="PATCH">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Progetto</label>
        <input type="text" class="form-control" name="name" value="{{ $project->name}}" disabled>
    </div>

    <div class="form-group">
        <label for="name">Cliente</label>
        <input type="text" class="form-control" name="name" value="{{ $project->customer->name_ref}} {{ $project->customer->surname_ref}} ({{ $project->customer->ragione_sociale}})" disabled>
    </div>

    <div class="form-group">
        <label for="description">Descrizione</label>
        <input type="text" class="form-control" name="description" value="{{ $project->description }}">
        <small class="form-text text-muted">Modifica Descrizione</small>
    </div>

    <div class="form-group">
        <label for="cost">Costo</label>
        <input type="number" step="any" class="form-control" name="cost" value="{{ $project->cost }}">
    </div>


    <button type="submit" class="btn btn-primary">Aggiorna</button>

    <a href="{{ URL::action('ProjectController@terminate', $project) }}" class="btn btn-danger">Termina Progetto</a>


    <a href="{{ URL::action('ProjectController@index') }}" class="btn btn-secondary">Indietro</a>

</form>    

@endsection