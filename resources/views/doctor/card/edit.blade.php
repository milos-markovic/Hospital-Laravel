@extends('layouts.app')


@section('content')

   

    <div class="w-75 mx-auto">

        <h2 class="text-center mb-4">Izvršite izmenu na kartonu pacijenta: {{ $pacijent->pacijent_ime.' '.$pacijent->pacijent_prezime }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('card.update',[$pacijent->pacijent_id,$card_id] ) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="card_id" value="{{ $card_id }}" >

            <div class="form-group">
                <label for="dijagnoza_id">Bolest:</label>
                <input type="text" name="dijagnoza_id" id="dijagnoza_id" value="{{ $naziv_bolesti }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="opis_bolesti">Opis bolesti:</label>
                <textarea name="opis_dijagnoza" id="opis_bolesti" cols="30" rows="5" class="form-control" >{{ $opis_bolesti }}</textarea>
            </div>
            <div class="form-froup">
                <label for="">Pronađite lek:</label>
                <input type="text" name="" id="search_drug" class="form-control w-25 mb-3" placeholder="Unesite naziv leka" >
            </div>
            <div class="form-group">
                <label for="">Lekovi: </label>

                <div id="lekovi">
                
                    @foreach( $lista_lekova  as $lek )

                        <div class="form-check
                        
                            <?php foreach( $preporuceni_lekovi as $preporuceni_lek ) :?>

                                <?php if( $preporuceni_lek->lek_id == $lek->lek_id ) :?>
        
                                {{ 'alert-primary w-25' }}

                                <?php endif; ?>

                            <?php endforeach; ?>
                        
                        ">
                            <input class="form-check-input drugs" name="lek_id[]" type="checkbox" value="{{ $lek->lek_id }}" id="drug"

                                

                                    {{  ( $lek->checked == 1 )  ?  'checked' : '' }}

                               
                            >
                            <label class="form-check-label" for="defaultCheck1">
                                {{ $lek->lek_naziv }}
                            </label>
                        </div>
                    @endforeach
                
                </div>

            </div>
            <div class="form-group text-center">
                <input type="submit"  value="Izmeni" class="btn btn-primary">
                <a href="{{ route('card.delete',[$pacijent->pacijent_id,$card_id]) }}" class="btn btn-danger ml-2">Delete</a>
            </div>
        
        </form>

    </div>


@stop


@section('ajax')


    <script>

        $(document).ready(function(){

            
            $("form").on('keyup',function(e){

                e.preventDefault();

                if( e.target.id == 'search_drug' ){

                    let insertValue = $("#search_drug").val();
                    let card_id = $("#card_id").val();

        

                    $.ajax({

                        url: 'http://localhost/Bolnica/public/serachDrugEditAjax',
                        method: 'GET',
                        data: { drugName: insertValue,cardId: card_id }

                    }).done(function( res ){

                        $("#lekovi").html( `${res}` );

                        var sList = "";
                        $('input[type=checkbox]').each(function () {
                            var sThisVal = (this.checked ? "1" : "0");
                            sList += (sList=="" ? sThisVal : "," + sThisVal);
                        });

                    });


                }               

            });


             $(".drugs").on('change',function(){

                
                let card_id = $("#card_id").val();

                url = "http://localhost/Bolnica/public/addDrug";

                let checkedValues = $(".drugs:checked");

                let element_values = [];

                $.each(checkedValues, function( index, el ) {
                   
                    element_values.push( $( el ).val() );

                });

               // console.log( element_values );
                $.ajax({

                    url: url,
                    method: 'GET',
                    data: { card_id: card_id, selectedValues: element_values}

                }).done(function( res ){

                    console.log( res );

                });
                


             });

            

        });
    </script>


@endsection