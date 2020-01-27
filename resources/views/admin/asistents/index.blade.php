@extends('layouts.app')


@section('content')

<h2 class="display-4 text-center mb-4">Asistenti:</h2>


    <div class="card">
        <table class="table table-hover m-0 text-center" id="adminAsistents">
            <thead class="bg-light text-dark">
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Adresa</th>
                    <th>Telefon</th>
                    <th>Korisničko ime</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($asistents as $asistent)
                    <tr>
                        <td>{{ $asistent->ime }}</td>
                        <td>{{ $asistent->prezime }}</td>
                        <td>{{ $asistent->adresa }}</td>
                        <td>{{ $asistent->telefon }}</td>
                        <td>{{ $asistent->username }}</td>
                        <td>{{ $asistent->email }}</td>
                        <td><a href="{{ route('asistents.edit',$asistent) }}" class="btn btn-primary btn-sm">Izmeni</a></td>
                        <td>
                            <form action="{{ route('asistents.destroy',$asistent->korisnik_id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Delete" class="btn btn-danger btn-sm deleteBtn" onclick="return confirm('Da li ste sigurni da želite da obrišete asistenta?')";>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   
    <a href="{{ route('asistents.create') }}" class="btn btn-primary mt-4">Napravi asistenta</a>
    


@stop


@section('script')

    <script>
    
        $(document).ready( function () {
            $('#adminAsistents').DataTable();
        } );
    
    
    </script>

@stop