@extends('layouts.sito')
@section('content')

    <h1> Gestione Cliente </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ URL::action('UserController@update', $user) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="surname">Cognome</label>
            <input type="text" class="form-control" name="surname" value="{{ $user->surname }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}" disabled> 
        </div>

        <div class="form-group">
            <label for="tel">Telefono</label>
            <input type="text" class="form-control" name="tel" value="{{ $user->tel }}">
            <small class="form-text text-muted">Inserisci il cognome</small>
        </div>

        <div class="form-group">
            @if(Auth::user()->email == $user->email)
               <label for="role">Ruolo</label>
               <input type="text" class="form-control" name="role" value="{{ $user->role }}" readonly> <!-- readonly al posto di disable in quanto crea errori nel controller-->
            @else
               <label for="role">Ruolo</label>
               <select class="form-control" name="role">
               <option disabled> ruolo corrente "{{ $user->role }}" </option>
                  <option> ADMIN </option>
                  <option> USER </option>
               </select>
            @endif
            <small class="form-text text-muted">Modifica il ruolo</small>
        </div>
        

        <button type="submit" class="btn btn-primary" onclick="return confirm('Confermare le modifiche?');">Aggiorna</button>
        @if(Auth::user()->email != $user->email)
         <a href="{{ URL::action('UserController@destroy', $user) }}" onclick="return confirm('Confermare questa operazione? Se sono presenti assegnazioni esse verranno eliminate.');" class="btn btn-danger">Termina Contratto</a>
         @endif
        <a href="{{ URL::action('UserController@index') }}" onclick="return confirm('Modifiche non confermate, sicuro di voler uscire?');" class="btn btn-secondary">Indietro</a>

    </form>  
@endsection