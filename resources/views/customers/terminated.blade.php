@extends('layouts.sito')
@section('content')

<!-- ELENCO -->
<h3>Lista Clienti</h3>
    <a href="{{ URL::action('CustomerController@index') }}" class="btn btn-outline-secondary">Visualizza Rapporti in corso</a>
    <div class="row top-buffer"></div>
<table id="customers-table" class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Ragione Sociale</th>
        <th scope="col">Referente</th>
        <th id="email_l" scope="col">Email</th>
        </tr>
    </thead>
    <tbody>

        @foreach($customers as $c)
        @if($c->finito == 'yes')
        <tr>
        <td><strong> {{ $c->ragione_sociale }} </strong></td>
        <td>{{ $c->name_ref }} {{$c->surname_ref }}</td>
        <td>{{ $c->email_ref }}</td>
        </tr>
        @endif
        @endforeach

    </tbody>
</table>


@endsection