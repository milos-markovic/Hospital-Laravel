@extends('layouts.app')


@section('content')

    <div class="card p-5 mb-4">
        <h1 class="text-center">Izmeni Asistenta</h1>

        @if ($errors->any())
            <div class="alert alert-danger my-2">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('asistents.update',$asistent->korisnik_id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="ime">Ime:</label>
                <input type="text" name="ime" id="ime" value="{{ $asistent->ime }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="prezime">Prezime:</label>
                <input type="text" name="prezime" id="prezime" value="{{ $asistent->prezime }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="adresa">Adresa:</label>
                <input type="text" name="adresa" id="adresa" value="{{ $asistent->adresa }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="text" name="telefon" id="telefon" value="{{ $asistent->telefon }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Korisnicko ime:</label>
                <input type="text" name="username" id="username" value="{{ $asistent->username }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="{{ $asistent->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="{{ $asistent->password }}" class="form-control">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Izmeni" class="btn btn-primary">
            </div>
        
        </form>
    </div>


@stop