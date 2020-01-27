@extends('layouts.app')

@section('content')

    <h1 class="text-center">Unesite u Karton</h1>

    <div class="mx-auto w-75">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    
        <form action="{{ route('card.store',$pacijent->pacijent_id) }}" method="POST">
            @csrf

            <input type="hidden" name="pacijent_id" id="pacijent_id" value="{{ $pacijent->pacijent_id }}">
            <div class="form-group">
                <label for="dijagnoza_id"></label>
                <select name="dijagnoza_id" id="dijagnoza_id" class="form-control">
                    <option value="">Izaberite bolest ...</option>
                    @foreach($bolesti as $bolest)
                        <option value="{{ $bolest->dijagnoza_id }}">{{ $bolest->dijagnoza_naziv }}</option>
                    @endforeach
                </select>
            </div>
            <div id="test">
                
            </div>    
        </form>
    
    </div>

@stop

@section('ajax')
    <script>
    
        $(document).ready(function(){

            $("#dijagnoza_id").change(function(e){

                let bolestId = Number(this.value);
                let pacijentId = $("#pacijent_id").val();

                let url = `http://localhost/Bolnica/public/cardInformationAjax`;


                $.ajax({
                    method: 'GET',
                    url: url,
                    data: { bolestid: bolestId,pacijentId: pacijentId }
                }).done(function(el){

                   // console.log(el);
                    $("#test").html( `${el}` );

                });

            });

            //console.log( $("#drugs") );
            $("form").keyup(function(e){

                e.preventDefault();

                if(e.target.id == 'searchDrug'){
                    
                    let inputValue = e.target.value;
                    let pacijentId = $("#pacijent_id").val();
                    let bolestId = $("#dijagnoza_id").val();

                    $.ajax({
                        url: 'http://localhost/Bolnica/public/searchDrugAjax',
                        method: 'GET',
                        data: { drugName: inputValue,pacijentId: pacijentId,bolestId: bolestId }

                    }).done(function(res){

                        $("#drugs").html( `${res}` );
                      // console.log(res);

                    });

                }

            });



        });
    
    </script>

@stop


