@extends('layouts.app')

@section('content')

    <div class="row">
                            
        <div class="col-4">
        
        <div class="jumbotron">
            <h1 class="display-4">Hospital Plus</h1>
            <p class="lead">Aplikacija namenjena kao pomoć u radu osoblja Bolnice</p>
            <hr class="my-4">
            <p>Potrebo je da se ulogujete da bi mogli u okviru svog domena rada da izvršite neophodne promene</p>
            <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
        </div>
        
        </div>

        <div class="col-8">
        
            <img src="{{ asset('images/bolnica.jpg') }}" class="img-fluid" alt="image" style="width: 1400px;">
        
        </div>
                        
    </div>

@stop