@extends("layouts.app")

@section("content")

<h2 class="display-4 text-center mb-4">Kartoni pacijenata:</h2>


<div class="card">
    <table class="table table-hover m-0">
        <thead class="bg-light text-dark">
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Adresa</th>
                <th>Telefon</th>
                <th>Datum rodjenja</th>
                <th>Krvna grupa</th>
                <th>Broj knjizice</th>
                <th>Broj kartona</th>
                <th>Izabrani lekar</th>
                <th></th>
                <th></th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($pacijents as $pacijent)
                <tr>
                    <td>{{ $pacijent->pacijent_ime }}</td>
                    <td>{{ $pacijent->pacijent_prezime }}</td>
                    <td>{{ $pacijent->pacijent_adresa }}</td>
                    <td>{{ $pacijent->pacijent_telefon }}</td>
                    <td>{{ $pacijent->pacijent_datum_rodjenja }}</td>
                    <td>{{ $pacijent->pacijent_krvna_grupa }}</td>
                    <td>{{ $pacijent->pacijent_broj_knjizice }}</td>
                    <td>{{ $pacijent->pacijent_broj_kartona }}</td>
                    <td>{{ $pacijent->doctor->ime.' '.$pacijent->doctor->prezime }}</td>
                   <td><a href="{{ route('pacijents.edit',$pacijent->pacijent_id) }}" class="btn btn-primary btn-sm">Izmeni</a></td>
                   <td>
                    <form action="{{ route('pacijents.destroy',$pacijent->pacijent_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                      <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                    </form>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<a href="{{ route('pacijents.create') }}" class="btn btn-primary mt-4">Kreiraj novi karton</a>




@stop



