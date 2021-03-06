@extends('layouts.sito')
@section('content')

    <h1> Contratti terminati</h1>
    <a href="{{ URL::action('UserController@index') }}" class="btn btn-outline-secondary">Visualizza Utenti Attivi</a>
    <div class="row top-buffer"></div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Totale ore lavorate</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;    
            foreach($users as $u){?>
            <?php if ($u->in_corso != 'yes') {?>
            <?php echo '<tr>'; ?>
            <?php echo '<td>'.$u->name.'</td>'; ?>
            <?php echo '<td>'.$u->surname.'</td>'; ?>
            <?php echo '<td>'.$u->email.'</td>'; ?>
            <?php echo '<td>'.$u->tel.'</td>'; ?>
            <?php $di = DB::table('diaries') ->where('user_id', $u->id) ->get(); 
             $h = 0; foreach($di as $d) {
                 $h = $d->hours + $h;
             } echo '<td style="text-align:center">'.$h.' ore'.'</td></center>'; ?>
            <?php echo '</tr>'; ?>
            <?php }; ?>
         <?php } ?>
        </tbody>
      </table>

@endsection