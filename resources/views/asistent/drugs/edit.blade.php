@extends('layouts.app')


@section('content')

    <div class="card p-5 mb-4">
        <h1 class="text-center">Izmeni Lek: {{ $drug->lek_naziv }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('drugs.update', [$drug->CategoryDrug->lek_kategorija_id, $drug->lek_id])}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="lek_naziv">Naziv leka:</label>
                <input type="text" name="lek_naziv" id="lek_naziv" value="{{ $drug->lek_naziv }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="lek_sifra">Sifra leka:</label>
                <input type="text" name="lek_sifra" id="lek_sifra" value="{{ $drug->lek_sifra }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="lek_stanje_magacin">Stanje u magacinu:</label>
                <input type="text" name="lek_stanje_magacin" id="lek_stanje_magacin" value="{{ $drug->lek_stanje_magacin }}" class="form-control">
            </div>
         
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Izmeni" class="btn btn-primary">
            </div>
        
        </form>
    </div>


@stop

