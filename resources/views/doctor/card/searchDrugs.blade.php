
@if( count($searchDrugs) > 0 )

    @foreach($searchDrugs  as $searchDrug)

        <div class="form-check
           
           <?php foreach($lekovi_za_bolest as $lek_za_bolest): ?>

                <?php echo ( $searchDrug->lek_id == $lek_za_bolest->lek_id ) ? 'alert-primary' : '' ;?>

           <?php endforeach; ?>
        
        ">
            <input name="lek_id[]" class="form-check-input" type="checkbox" value="{{ $searchDrug->lek_id }}" 
            
                
                    
            id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                {{ $searchDrug->lek_naziv }}
            </label>
        </div>

    @endforeach

@else

    <h5>Nema rezultata</h5>

@endif

