@extends('layouts.app')


@section('content')

    <div class="card p-5 mb-4">
        <h1 class="text-center">Novi Lek</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('drugs.store', $categoryId)  }}" method="POST">
            @csrf
            <input type="hidden" name="lek_kategorija_id" value="{{$categoryId}}">
           
            <div class="form-group">
                <label for="lek_naziv">Naziv leka:</label>
                <input type="text" name="lek_naziv" id="lek_naziv"  class="form-control">
            </div>
            <div class="form-group">
                <label for="lek_sifra">Sifra leka:</label>
                <input type="text" name="lek_sifra" id="lek_sifra"  class="form-control">
            </div>
            <div class="form-group">
                <label for="lek_stanje_magacin">Stanje u magacinu:</label>
                <input type="text" name="lek_stanje_magacin" id="lek_stanje_magacin"  class="form-control">
            </div>

         
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Unesi novi lek" class="btn btn-primary">
            </div>
        
        </form>
    </div>


@stop

