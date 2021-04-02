@extends('admin.home')
@section('content')
<div class="container">
    <h1> Inserimento Progetto </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ URL::action('ProjectController@store') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" name="name" >
          <small class="form-text text-muted">Inserisci nome progetto</small>
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control" name="description" >
            <small class="form-text text-muted">Inserisci descrizione</small>
        </div>

        <div class="form-group">
            <label for="note">Note</label>
            <input type="text" class="form-control" name="note" >
            <small class="form-text text-muted">Inserisci eventuali note</small>
        </div>

        <div class="form-group">
            <label for="begin">Data Inizio</label>
            <input type="date" class="form-control" name="begin" >
            <small class="form-text text-muted">Inserisci la data di inizio</small>
        </div>

        <div class="form-group">
            <label for="p_end">Data Possibile Fine</label>
            <input type="date" class="form-control" name="p_end" >
            <small class="form-text text-muted">Inserisci possibile data fine</small>
        </div>

        <div class="form-group">
            <label for="d_end">Data Fine</label>
            <input type="date" class="form-control" name="d_end" >
            <small class="form-text text-muted">Inserisci la data di scadenza se disponibile</small>
        </div>

        <div class="form-group">
            <label for="customer_id">Seleziona Cliente</label>
            <select class="form-control" name="customer_id">
                @foreach ($customers as $c)
                    <option value="{{ $c->id }}">{{ $c->ragione_sociale }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Seleziona cliente di riferimento</small>
        </div>
        
        <div class="form-group">
            <label for="cost">Costo Orario</label>
            <input type="number" class="form-control" name="cost" >
            <small class="form-text text-muted">Inserisci costo orario</small>
        </div>
        
        <!--<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />-->

        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ URL::action('AdminController@index') }}" class="btn btn-secondary">Indietro</a>

    </form>    
</div>
@endsection