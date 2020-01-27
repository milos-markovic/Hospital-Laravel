@extends("layouts.app")

@section("content")

    <h2 class="display-4 text-center mb-4">Doktori:</h2>


    <div class="card">
        <table class="table table-hover m-0 text-center">
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
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->ime }}</td>
                        <td>{{ $doctor->prezime }}</td>
                        <td>{{ $doctor->adresa }}</td>
                        <td>{{ $doctor->telefon }}</td>
                        <td>{{ $doctor->username }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td><a href="{{ route('doctors.edit',$doctor->korisnik_id) }}" class="btn btn-primary btn-sm">Izmeni</a></td>
                        <td>
                            <form action="{{ route('doctors.destroy',$doctor->korisnik_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Da li ste sigurni da želite da obrišete doktora?')";>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <a href="{{ route('doctors.create') }}" class="btn btn-primary mt-4">Napravi doktora</a>


@stop


@section('script')

    <script>
    
        $(document).ready( function () {
            $('#adminAsistents').DataTable();
        } );
    
    
    </script>

@stop