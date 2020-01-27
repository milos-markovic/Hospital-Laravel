@extends('layouts.app')


@section('content')

    <div class="card p-5 mb-4">
        <h1 class="text-center">Izmeni Pacijenta: {{ $pacijent->pacijent_ime.' '.$pacijent->pacijent_prezime }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pacijents.update', $pacijent->pacijent_id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="ime">Ime:</label>
                <input type="text" name="pacijent_ime" id="ime" value="{{ $pacijent->pacijent_ime }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="prezime">Prezime:</label>
                <input type="text" name="pacijent_prezime" id="prezime" value="{{ $pacijent->pacijent_prezime }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="adresa">Adresa:</label>
                <input type="text" name="pacijent_adresa" id="adresa" value="{{ $pacijent->pacijent_adresa }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefon">Telefon:</label>
                <input type="text" name="pacijent_telefon" id="telefon" value="{{ $pacijent->pacijent_telefon }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="datum">Datum rodjenja:</label>
                <input type="text" name="pacijent_datum_rodjenja" id="datum_rodjenja" value="{{ $pacijent->pacijent_datum_rodjenja }}" class="form-control datepicker">
            </div>
            <div class="form-group">
                <label for="pol">Pol:</label>
               
                <select name="pacijent_pol" id="pol" class="form-control">
                    <option value="M" 
                        @if( $pacijent->pacijent_pol === 'M' )
                            {{ 'selected' }}
                        @endif
                    >Muški</option>
                    <option value="Ž"
                         @if( $pacijent->pacijent_pol === 'Ž' )
                            {{ 'selected' }}
                        @endif
                    >Ženski</option>
                </select> 
                
            </div>
            <div class="form-group">
                <label for="krvna">Krvna grupa:</label>
                <select name="pacijent_krvna_grupa" id="" class="form-control">
                    <option value="A+" @if( $pacijent->pacijent_krvna_grupa === 'A+') {{'selected'}} @endif >A+</option>
                    <option value="A-" @if( $pacijent->pacijent_krvna_grupa === 'A-') {{'selected'}} @endif >A-</option>
                    <option value="B+" @if( $pacijent->pacijent_krvna_grupa === 'B+') {{'selected'}} @endif >B+</option>
                    <option value="B-" @if( $pacijent->pacijent_krvna_grupa === 'B-') {{'selected'}} @endif >B-</option>
                    <option value="0+" @if( $pacijent->pacijent_krvna_grupa === '0+') {{'selected'}} @endif >0+</option>
                    <option value="0-" @if( $pacijent->pacijent_krvna_grupa === '0-') {{'selected'}} @endif >0-</option>
                    <option value="AB+" @if( $pacijent->pacijent_krvna_grupa === 'AB+') {{'selected'}} @endif >AB+</option>
                    <option value="AB-" @if( $pacijent->pacijent_krvna_grupa === 'AB-') {{'selected'}} @endif >AB-</option>
                </select>

            </div>
            <div class="form-group">
                <label for="knjizica">Broj knjizice:</label>
                <input type="text" name="pacijent_broj_knjizice" id="knjizica" value="{{ $pacijent->pacijent_broj_knjizice  }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="karton">Broj kartona:</label>
                <input type="text" name="pacijent_broj_kartona" id="karton" value="{{ $pacijent->pacijent_broj_kartona }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="korisnik_id">Izabrani Lekar:</label>
                <select name="korisnik_id" id="korisnik_id" class="form-control">
W
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->korisnik_id }}"
                            @if( $doctor->korisnik_id === $pacijent->korisnik_id )
                                {{ 'selected' }}
                            @endif              
                        >{{  $doctor->ime.' '.$doctor->prezime }}</option>
                    @endforeach
                    
                </select>         
            </div>
            <div class="form-group text-center">
                <input type="submit" name="submit" value="Izmeni" class="btn btn-primary">
            </div>
        
        </form>
    </div>


@stop

