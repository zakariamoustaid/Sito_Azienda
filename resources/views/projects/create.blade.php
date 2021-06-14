@extends('layouts.sito')
@section('content')


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

        <div class="form-row">
        <div class="col">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" >
            <small class="form-text text-muted">*Inserisci nome progetto</small>
        </div>
        <div class="col">
            <label for="customer_id">Seleziona Cliente</label>
            <select class="form-control" name="customer_id">
                <option value=""></option>
                @foreach ($customers as $c)
                    <option value="{{ $c->id }}">{{ $c->ragione_sociale }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">*Seleziona cliente di riferimento</small>
        </div>
    </div>

    <div class="form-row">
        <div class="col">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control" name="description" >
            <small class="form-text text-muted">*Inserisci descrizione</small>
        </div>
        <div class="col">
            <label for="cost">Costo Orario</label>
            <input type="number" class="form-control" name="cost" >
            <small class="form-text text-muted">*Inserisci costo orario</small>
        </div>
    </div>

    <div class="form-row">
        <div class="col">
            <label for="begins">Data Inizio</label>
            <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="begins" >
            <small class="form-text text-muted">*Inserisci la data di inizio</small>
        </div>
        <div class="col">
            <label for="p_end">Data Possibile Fine</label>
            <input type="date" value="<?php echo date('Y-m-d', + strtotime("+30 days")); ?>" class="form-control" name="p_end" >
            <small class="form-text text-muted">*Inserisci possibile data fine</small>
        </div>
    </div>


    <div class="form-group">
        <label for="note">Note</label>
        <input type="text" class="form-control" name="note" >
        <small class="form-text text-muted">Inserisci eventuali note</small>
    </div>
        
        
        <!--<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />-->

        <button type="submit" onclick="return confirm('Confermare inserimento Progetto?');" class="btn btn-primary">Salva</button>
        <a href="{{ URL::action('ProjectController@index') }}" onclick="return confirm('Inserimento non confermato, sicuro di voler uscire?');" class="btn btn-secondary">Indietro</a>

    </form>    
@endsection

