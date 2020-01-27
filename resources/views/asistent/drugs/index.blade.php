@extends("layouts.app")

@section("content")

    <a href="{{ route('categoryDrugs.index') }}" class="h5">< Nazad na kategoriju Lekova</a>

    <h2 class="text-center mb-4 mt-4">Lekovi</h2>

    <div class="mx-auto w-50">

        @if( count($drugs) > 0 )
            <div class="card">
                <table class="table table-hover m-0">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th>Naziv leka</th>
                            <th>Šifra</th>
                            <th>Stanje u magacinu</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($drugs as $drug)
                                
                                <tr>
                                    <td>{{ $drug->lek_naziv }}</td>
                                    <td>{{ $drug->lek_sifra }}</td>
                                    <td>{{ $drug->lek_stanje_magacin }}</td>

                                    <td><a href="{{ route('drugs.edit',[$drug->CategoryDrug->lek_kategorija_id,$drug->lek_id] ) }}" class="btn btn-primary btn-sm">Izmeni</a></td>
                                    <td>
                                        <form action="{{ route('drugs.destroy',[$drug->CategoryDrug->lek_kategorija_id,$drug->lek_id] ) }}" method="POST">
                                            @csrf

                                            @if(!$drug->lek_stanje_magacin > 0)
                                                @method('DELETE')
                                                
                                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                
                            @endforeach
                    
                    </tbody>
                </table>
            </div>
        @else
            <h2>Unesite novi lek</h2>
        @endif

        <a href="{{ route('drugs.create',$categoryDrug->lek_kategorija_id) }}" class="btn btn-primary mt-4">Novi lek</a>
    </div>






@stop



