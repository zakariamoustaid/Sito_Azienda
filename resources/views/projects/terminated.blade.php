@extends('layouts.sito')
@section('content')

<h1> Progetti Terminati </h1>
@if (session('alert'))
<div class="alert alert-success">
    {{ session('alert') }}
</div>
@endif

<a href="{{ URL::action('ProjectController@index') }}" class="btn btn-outline-dark">Visualizza Progetti in corso</a>
<div class="row top-buffer"></div>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Cliente</th>
        <th scope="col">Data Fine Prevista</th>
        <th scope="col">Data Fine Reale </th>
        <th scope="col">Ricavi </th>
        </tr>
    </thead>
    <tbody>

        @foreach($projects as $p)
        @if($p->finito != 'no')
        <tr>
        <td><strong>{{ $p->name }}</strong> </td>
        <td>{{ $p->description }}</td>
        <td>{{ $p->customer->ragione_sociale }}</td>
        <td>{{ date('d/m/Y', strtotime($p->p_end)) }}</td>
        <th scope="row">{{ date('d/m/Y', strtotime($p->d_end)) }}</th>
        <?php $r = 0; $h = DB::table('diaries') ->where('project_id', $p->id) ->sum('hours');
            $r = $h*$p->cost; echo "<td><u><strong>".$r." Euro</strong></u></th>"; ?>
        </tr>
        @endif
        @endforeach

    </tbody>
</table>

@endsection
