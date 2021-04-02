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

    <form action="{{ URL::action('CustomerController@store') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="ragione_sociale">Nome Societ&agrave</label>
          <input type="text" class="form-control" name="ragione_sociale" >
          <small class="form-text text-muted">Inserisci ragione sociale</small>
        </div>

        <div class="form-group">
            <label for="name_ref">Nome Referente</label>
            <input type="text" class="form-control" name="name_ref" >
            <small class="form-text text-muted">Inserisci il nome</small>
        </div>

        <div class="form-group">
            <label for="surname_ref">Cognome Referente</label>
            <input type="text" class="form-control" name="surname_ref" >
            <small class="form-text text-muted">Inserisci il cognome</small>
        </div>

        <div class="form-group">
            <label for="email_ref">Email Referente</label>
            <input type="text" class="form-control" name="email_ref" >
            <small class="form-text text-muted">Inserisci la mail</small>
        </div>
        
        <!--<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />-->

        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ URL::action('AdminController@index') }}" class="btn btn-secondary">Indietro</a>

    </form>    
</div>
@endsection