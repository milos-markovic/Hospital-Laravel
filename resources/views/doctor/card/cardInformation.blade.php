

    <div class="form-group">
        <div class="form-row">
            <div class="col-3">    
                <label for="">Pronađite lek: </label>
                <input type="text" id="searchDrug" class="form-control mb-4" placeholder="Unesite ime leka">

                <div id="drugs">
                    <label for="">Lekovi: </label>
                    @foreach($lekovi as $lek)

                            <div class="form-check 
                            
                                <?php foreach($lekovi_za_bolest as $lek_za_bolest) :?>
                                
                                    <?php echo ($lek->lek_id == $lek_za_bolest->lek_id) ? 'alert-primary' : ''; ?>

                                <?php endforeach; ?>
                            ">
                                <input name="lek_id[]" class="form-check-input" type="checkbox" value="{{ $lek->lek_id }}" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{ $lek->lek_naziv }} 
                                </label>
                            </div>

                    @endforeach

                </div>

            </div>
            <div class="col-9">
            
                <label for="opis_dijagnoza">Dijagnoza</label>
                <textarea name="opis_dijagnoza" id="opis_dijagnoza" cols="30" rows="10" class="form-control" placeholder="Unesite opis bolesti"></textarea>

            </div>
        </div>
    </div>
    <div class="form-group text-center mt-5">
        <input type="submit" value="Unesi" class="btn btn-primary">
    </div>


    <!-- @section('ajax')

    console.log( $("#searchDrug") );


    @stop -->



