@extends('layouts.app')


@section('content')

    <div class="card p-5 mb-4">
        <h1 class="text-center">Izmeni naziv bolesti: {{ $bolest->dijagnoza_naziv }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bolesti.update', $bolest->dijagnoza_id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="dijagnoza_naziv">Naziv bolesti:</label>
                <input type="text" name="dijagnoza_naziv" id="dijagnoza_naziv" value="{{ $bolest->dijagnoza_naziv }}" class="form-control">
            </div>
            
         
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Izmeni" class="btn btn-primary">
            </div>
        
        </form>
    </div>


@stop

