@extends('layouts.app')


@section('content')

<h1 class="text-center">Moji Pacijenti</h1>

<div class="card mt-5 text-center">
    <table class="table table-hover m-0">
        <thead>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Telefon</th>
            <th>Datum Rođenja</th>
            <th>Pol</th>
            <th>Krvna grupa</th>
            <th>Karton</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($pacijents as $pacijent)
            <tr>
                <td>{{ $pacijent->pacijent_ime }}</td>
                <td>{{ $pacijent->pacijent_prezime }}</td>
                <td>{{ $pacijent->pacijent_telefon }}</td>
                <td>{{ $pacijent->pacijent_datum_rodjenja }}</td>
                <td>{{ $pacijent->pacijent_pol }}</td>
                <td>{{ $pacijent->pacijent_krvna_grupa }}</td>
                <td>{{ $pacijent->pacijent_broj_kartona }}</td>
                <th><a href="{{ route('card.index',$pacijent->pacijent_id) }}">Pregled Kartona</a></th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@stop