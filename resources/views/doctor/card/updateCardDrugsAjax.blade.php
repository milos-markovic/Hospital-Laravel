


@if( count($searchDrugs) )

   @foreach($searchDrugs as $drug)
        
        <div class="form-check
        
        ">
            <input class="form-check-input drugs" name="lek_id[]" type="checkbox" value="{{ $drug->lek_id }}" id="defaultCheck1"
            
                {{ ( $drug->checked == 1 ) ? 'checked' : '' }}
                
            >
            <label class="form-check-label" for="defaultCheck1">
                {{ $drug->lek_naziv }}
            </label>
        </div>

    @endforeach

@else

    <h5>Nema rezultata</h5>

@endif



<script>

$(document).ready(function(){



     $(".drugs").on('click',function(){

        let lek_id = $(this).val();
        let card_id = $("#card_id").val();

        url = "http://localhost/Bolnica/public/addDrug";

        //console.log( lek_id, card_id );

        $.ajax({

            url: url,
            method: 'GET',
            data: {lek_id: lek_id,card_id: card_id}

        }).done(function( res ){

            console.log( res );

        });
        
     });

});
</script>








