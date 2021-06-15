@extends('layouts.sito')
@section('content')

    <h1> Utenti Attivi</h1>
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
    <a href="{{ URL::action('UserController@show_terminated') }}" class="btn btn-outline-secondary">Visualizza Contratti Conclusi</a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Ruolo</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="filtro">
        <input type="text" class="form-control mb-3" id="myInput" placeholder="Filtra per Nome/Cognome, Email, Telefono o Ruolo">
          <?php
            $i = 1;    
            foreach($users as $u){?>
            <?php if ($u->in_corso != 'no') {?>
            <?php echo '<tr>'; ?>
            <?php echo '<td>'.$u->name.'</td>'; ?>
            <?php echo '<td>'.$u->surname.'</td>'; ?>
            <?php echo '<td>'.$u->email.'</td>'; ?>
            <?php echo '<td>'.$u->tel.'</td>'; ?>
            <?php echo '<td>'.$u->role.'</td>'; ?>
            <td><a href="{{ URL::action('UserController@edit', $u) }}" class="btn btn-outline-dark"> Gestione Utente</a></td>
            <?php echo '</tr>'; ?>
            <?php }; $i++; ?>
         <?php } ?>
        </tbody>
      </table>

<script type="application/javascript">
   $(document).ready(function(){
      $(".table table-hover").on("keyup",function () {
         //$('[data-toggle="popover"]').popover()
      });
      
      $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#filtro tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
   });
});
</script>
@endsection
