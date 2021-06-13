@extends('layouts.sito')
@section('content')

    <h1> Lista Utenti </h1>
    @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
    @endif
    @if (session('no'))
    <div class="alert alert-danger" >
        {{ session('no') }}
    </div>
   @endif

    <a href="{{ URL::action('UserController@create') }}" class="btn btn-outline-primary float-md-right mb-2">Inserimento Utente</a>
    <a href="{{ URL::action('UserController@show_terminated') }}" class="btn btn-outline-secondary btn-sm">Visualizza Contratti Conclusi</a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Ruolo</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;    
            foreach($users as $u){?>
            <?php if ($u->in_corso != 'no') {?>
            <?php echo '<tr>'; ?>
            <?php echo '<td><strong>'.$i.'</strong></td>'; ?>
            <?php echo '<td>'.$u->name.'</td>'; ?>
            <?php echo '<td>'.$u->surname.'</td>'; ?>
            <?php echo '<td>'.$u->email.'</td>'; ?>
            <?php echo '<td>'.$u->tel.'</td>'; ?>
            <?php echo '<td>'.$u->role.'</td>'; ?>
            <td><a href="{{ URL::action('UserController@edit', $u) }}" class="btn btn-outline-dark"> Modifica</a></td>
            <?php echo '</tr>'; ?>
            <?php }; $i++; ?>
         <?php } ?>
        </tbody>
      </table>
@endsection
