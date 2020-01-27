@extends('layouts.app')


@section('content')

    <div class="card p-5 mb-4">
        <h1 class="text-center">Napravi Doktora</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('doctors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ime">Ime:</label>
                <input type="text" name="ime" id="ime" class="form-control">
            </div>
            <div class="form-group">
                <label for="prezime">Prezime:</label>
                <input type="text" name="prezime" id="prezime" class="form-control">
            </div>
            <div class="form-group">
                <label for="adresa">Adresa:</label>
                <input type="text" name="adresa" id="adresa" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="text" name="telefon" id="telefon" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Korisnicko ime:</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Napravi" class="btn btn-primary">
            </div>
        
        </form>
    </div>


@stop