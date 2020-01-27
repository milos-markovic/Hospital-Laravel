@extends('layouts.app')


@section('content')

<a class="h5" href="{{ route('doctor.index') }}">Nazad</a>

<h1 class="text-center">Karton Pacijenta: {{  $pacijent->pacijent_ime.' '.$pacijent->pacijent_prezime }}</h1>

<div class="card mt-5">
    <table class="table table-hover m-0 text-center">
        <thead>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Telefon</th>
            <th>Datum Rođenja</th>
            <th>Pol</th>
            <th>Krvna grupa</th>
            <th>Karton</th>
            <th>Izabrani Lekar</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pacijent->pacijent_ime }}</td>
                <td>{{ $pacijent->pacijent_prezime }}</td>
                <td>{{ $pacijent->pacijent_telefon }}</td>
                <td>{{ $pacijent->pacijent_datum_rodjenja }}</td>
                <td>{{ $pacijent->pacijent_pol }}</td>
                <td>{{ $pacijent->pacijent_krvna_grupa }}</td>
                <td>{{ $pacijent->pacijent_broj_kartona }}</td>
                <td>{{ $pacijent->doctor->ime.' '.$pacijent->doctor->prezime }}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card mt-5">

    <table class="table table-bordered  table-hover m-0">
        <thead>
            <tr>
                <th>Datum posete</th>
                <th>Bolesti</th>
                <th>Opis bolesti</th>
                <th>Lekovi</th>
            </tr>
        </thead>
        <tbody class="align-items-center">
        
            @foreach($result as $key  => $res)
                            
                <tr>
                    <td class="">

                         {{ Carbon\Carbon::parse("$key")->format('j F, Y') }}
        
                    </td>
                   <td class="">
                        @foreach($res->unique() as $r)
                   
                            <?php  $test = count($r) ?>

                            @foreach( $r as $middle )   

                               
                                @if( $test == 1 )

                                    <p><b><a href="{{ route('card.edit', [$pacijent->pacijent_id,$middle->pacijent_dijagnoza_id] ) }}" style="text-decoration:underline  !important;">{{ \App\Bolest::find( $middle->dijagnoza_id )->dijagnoza_naziv }}</a></b></p>

                                @else
  
                                    <span>{{ ' ' }}</span>

                                    <?php $test--; ?>

                                @endif
                            

                            @endforeach

                        @endforeach
                   </td>
                   <td class="">
                        @foreach($res as $r)

                            <?php  $test = count($r) ?>

                            
                            @foreach( $r as $middle )

                            
                                @if( $test == 1 )

                                    <p>{{ $middle->opis_dijagnoza }}</p>
                                    
                                @else

                                    {{ ' ' }}

                                    <?php $test--; ?>
                                    
                                @endif
                            

                            @endforeach
                            
                            
                        @endforeach
                   </td>
                   <td class="">
                        @foreach($res as $r)

                            <p>
                                
                                    @foreach( $r as $middle )

                                    {{ \App\Drug::find( $middle->lek_id )->lek_naziv.', ' }}

                                    @endforeach
                                
                            </p>

                        @endforeach
                   </td> 
                </tr>


            @endforeach
        </tbody>
    </table>
</div>

<div class="text-center">
    <a href="{{ route('card.create',$pacijent->pacijent_id) }}" class="btn btn-primary mt-4" >Unesi u karton</a>
</div>





@stop