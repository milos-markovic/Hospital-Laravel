@extends('layouts.app')


@section('content')

    <h2 class="display-4 text-center mb-4">Admin:</h2>


    <div class="card">
        <table class="table table-hover m-0 text-center">
            <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Adresa</th>
                    <th>Telefon</th>
                    <th>Korisničko ime</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $admin->ime }}</td>
                    <td>{{ $admin->prezime }}</td>
                    <td>{{ $admin->adresa }}</td>
                    <td>{{ $admin->telefon }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>

@stop