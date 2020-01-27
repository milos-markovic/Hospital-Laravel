@extends('layouts.app')


@section('content')

    <div class="card p-5 mb-4">
        <h1 class="text-center mb-4">Naziv kategorije lekova</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


       
        
        <form action="{{ route('categoryDrugs.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <div class="form-row justify-content-center">
                   <input type="text" name="lek_kategorija_naziv" id="lek_kategorija_naziv" placeholder="Naziv kategorije lekova" class="form-control w-75">
                </div>
            </div>
           
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Unesi" class="btn btn-primary">
            </div>
        
        </form>
       
    </div>


@stop

