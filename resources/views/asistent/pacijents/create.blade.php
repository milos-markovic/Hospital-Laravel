@extends('layouts.app')


@section('content')

    <div class="card p-5 mb-4">
        <h1 class="text-center">Novi Pacijent</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pacijents.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ime">Ime:</label>
                <input type="text" name="pacijent_ime" id="ime" class="form-control">
            </div>
            <div class="form-group">
                <label for="prezime">Prezime:</label>
                <input type="text" name="pacijent_prezime" id="prezime" class="form-control">
            </div>
            <div class="form-group">
                <label for="adresa">Adresa:</label>
                <input type="text" name="pacijent_adresa" id="adresa" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="text" name="pacijent_telefon" id="telefon" class="form-control">
            </div>
            <div class="form-group">
                <label for="datum">Datum rodjenja:</label>
                <input type="text" name="pacijent_datum_rodjenja" id="datum_rodjenja" class="form-control datepicker">
            </div>
            <div class="form-group">
                <label for="pol">Pol:</label>
               
                <select name="pacijent_pol" id="pol" class="form-control">
                    <option value="">Izaberi...</option>
                    <option value="M">Muški</option>
                    <option value="Ž">Ženski</option>
                </select>
                <!-- <input type="text" name="pacijent_pol" id="pol" class="form-control"> -->
            </div>
            <div class="form-group">
                <label for="krvna">Krvna grupa:</label>
                <select name="pacijent_krvna_grupa" id="" class="form-control">
                    <option value="">Izaberi...</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="0+">0+</option>
                    <option value="0-">0-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <!-- <input type="text" name="pacijent_krvna_grupa" id="krvna" class="form-control"> -->
            </div>
            <div class="form-group">
                <label for="knjizica">Broj knjizice:</label>
                <input type="text" name="pacijent_broj_knjizice" id="knjizica" class="form-control">
            </div>
            <div class="form-group">
                <label for="karton">Broj kartona:</label>
                <input type="text" name="pacijent_broj_kartona" id="karton" class="form-control">
            </div>

            <div class="form-group">
                <label for="korisnik_id">Izabrani Lekar:</label>
                <select name="korisnik_id" id="korisnik_id" class="form-control">

                    <option value="">Izaberi...</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->korisnik_id }}">{{  $doctor->ime.' '.$doctor->prezime }}</option>
                    @endforeach
                    
                </select>         
            </div>
           
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Napravi" class="btn btn-primary">
            </div>
        
        </form>
    </div>


@stop

