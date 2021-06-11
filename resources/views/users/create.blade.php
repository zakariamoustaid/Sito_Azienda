@extends('layouts.sito')
@section('content')



   <h1> Inserimento Utente </h1>
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif

   @if (session('no'))
    <div style="display: block" class="alert alert-danger" >
        {{ session('no') }}
    </div>
   @endif
         <form action="{{ URL::action('UserController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-row">
               <div class="col">
                  <label for="name">Nome</label>
                  <input type="text" class="form-control" name="name" >
                  <small class="form-text text-muted">Inserisci nome utente</small>
               </div>
               <div class="col">
                  <label for="surname">Cognome</label>
                  <input type="text" class="form-control" name="surname">
                  <small class="form-text text-muted">Inserisci cognome utente</small>
               </div>
            </div>

            <div class="form-row">
               <div class="col">
                  <label for="note">Ruolo</label>
                  <select class="form-control" name="role">
                  <option>  </option>
                     <option> ADMIN </option>
                     <option> USER </option>
                  </select>
                  <small class="form-text text-muted">Inserisci ruolo utente</small>
               </div>
               <div class="col">
                  <label for="tel">Telefono</label>
                  <input type="text" class="form-control" name="tel" >
                  <small class="form-text text-muted">Inserire numero telefono</small>
               </div>
            </div>

            <div class="form-row">
               <div class="col">
                  <label for="email">Email</label>
                  <input type="email" pattern=".+@coffedev.com" value="@coffedev.com" class="form-control" name="email" >
                  <small class="form-text text-muted">Inserisci email utente</small>
               </div>
               <div class="col">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" >
                  <small class="form-text text-muted">Inserisci password utente</small>
               </div>
            </div>
            
            <div class="row top-buffer"></div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{ URL::action('UserController@index') }}" onclick="return confirm('Inserimento non confermato, sicuro di voler uscire?');" class="btn btn-secondary">Indietro</a>
         </form>

@endsection