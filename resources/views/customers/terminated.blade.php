@extends('layouts.sito')
@section('content')

<!-- ELENCO -->
<h4>Lista Clienti</h4>
    <a href="{{ URL::action('CustomerController@index') }}" class="btn btn-outline-secondary btn-sm">Visualizza Rapporti in corso</a>
<table id="customers-table" class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Ragione Sociale</th>
        <th scope="col">Nome Referente</th>
        <th scope="col">Cognome Referente</th>
        <th id="email_l" scope="col">Email</th>
        </tr>
    </thead>
    <tbody>

        @foreach($customers as $c)
        @if($c->finito == 'yes')
        <tr>
        <td>{{ $c->ragione_sociale }} </td>
        <td>{{ $c->name_ref }}</td>
        <td>{{ $c->surname_ref }}</td>
        <td>{{ $c->email_ref }}</td>
        </tr>
        @endif
        @endforeach

    </tbody>
</table>


@endsection