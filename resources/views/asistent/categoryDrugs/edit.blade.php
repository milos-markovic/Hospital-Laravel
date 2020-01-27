@extends('layouts.app')


@section('content')

    <div class="card p-5 mb-4">
        <h1 class="text-center">Izmeni naziv kategorije leka: {{ $categoryDrug->lek_kategorija_naziv }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categoryDrugs.update', $categoryDrug->lek_kategorija_id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="lek_kategorija_naziv">Naziv kategorije leka:</label>
                <input type="text" name="lek_kategorija_naziv" id="lek_kategorija_naziv" value="{{ $categoryDrug->lek_kategorija_naziv }}" class="form-control">
            </div>
            
         
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Izmeni" class="btn btn-primary">
            </div>
        
        </form>
    </div>


@stop

