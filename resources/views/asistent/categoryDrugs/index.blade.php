@extends("layouts.app")

@section("content")

<h2 class="display-4 text-center mb-4">Kategorije Lekova:</h2>

<div class="mx-auto w-50">

    <div class="card">
        <table class="table table-hover m-0">
            <thead class="bg-light text-dark">
                <tr>
                    <th>Naziv kategorije</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoryDrugs as $category)
                    <tr>
                        <td> <a href="{{ route( 'drugs.index',$category->lek_kategorija_id ) }}">{{ $category->lek_kategorija_naziv }}</a></td>
                    <td><a href="{{ route('categoryDrugs.edit',$category->lek_kategorija_id) }}" class="btn btn-primary btn-sm">Izmeni</a></td>
                    <td>
                        <form action="{{ route('categoryDrugs.destroy',$category->lek_kategorija_id) }}" method="POST">
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

    <a href="{{ route('categoryDrugs.create') }}" class="btn btn-primary mt-4">Nova kategorija lekova</a>


</div>








@stop



