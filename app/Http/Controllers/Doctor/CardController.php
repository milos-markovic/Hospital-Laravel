<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;


use App\Pacijent;
use App\Bolest;
use App\Drug;
use App\Card;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Pacijent $pacijent)
    {   
     

      $result = \DB::table('pacijent_dijagnoza')->where('pacijent_id',$pacijent->pacijent_id)->get()->groupBy(['datum_posete','dijagnoza_id']);

      return view('doctor.card.index',compact('pacijent','result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pacijent $pacijent)
    {
     
       $bolesti = Bolest::all();

       return view('doctor.card.create',compact('bolesti','pacijent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pacijent $pacijent)
    {
     //   dd( $request->all() );

        $validatedData = $request->validate([
            'pacijent_id' => 'required',
            'dijagnoza_id' => 'required',
            'lek_id' => 'required',
            'opis_dijagnoza' => 'required'
        ]);

    
        foreach($request->lek_id as $lekId){

            $insertInCard = $pacijent->bolesti()->attach($request->dijagnoza_id, [
                'lek_id' => $lekId,
                'opis_dijagnoza' => $request->opis_dijagnoza,
                'datum_posete' => Carbon::now()
            ] );
        }

        return redirect()->route('card.index',$pacijent->pacijent_id)->with('status','Uneli ste nove vrednosti u karton');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pacijent $pacijent,Card $card)
    {

        $naziv_bolesti = Bolest::find($card->dijagnoza_id)->dijagnoza_naziv;
        $bolest_id = Bolest::find($card->dijagnoza_id)->dijagnoza_id;

        $srednja_tabela_rezultati = Card::where('dijagnoza_id',$card->dijagnoza_id)->where('datum_posete',$card->datum_posete)->get();
    
        $selektovani_lekovi = collect();

        foreach( $srednja_tabela_rezultati as $objekat ){

            $selektovani_lekovi[] = Drug::find( $objekat->lek_id );
        }


        

        // session(['selektovani_lekovi' => $selektovani_lekovi]);

        $opis_bolesti;

        foreach($srednja_tabela_rezultati as $objekat ){
            if( $objekat->opis_dijagnoza != '' ){
                $opis_bolesti = $objekat->opis_dijagnoza; 
            }
        }

        // $lekovi = Drug::all();

        

        $preporuceni_lekovi = Bolest::find($card->dijagnoza_id)->lekovi;

        $card_id = $card->pacijent_dijagnoza_id;

        // return view('doctor.card.edit',compact( 'pacijent','naziv_bolesti','bolest_id','lekovi','opis_bolesti','preporuceni_lekovi','card_id' ));

        $svi_lekovi = Drug::all();

        session(['svi_lekovi' =>$svi_lekovi]);

        $lista_lekova = session('svi_lekovi');

        foreach(session('svi_lekovi') as $object){

            if( $selektovani_lekovi->contains($object) ){

                $object->checked = 1;
            }else{
                $object->checked = 0;
            }
        }

         return view('doctor.card.edit',compact( 'pacijent','naziv_bolesti','bolest_id','opis_bolesti','preporuceni_lekovi','card_id','lista_lekova' ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pacijent $pacijent, Card $card)
    {
        //dd($card);

        $validatedData = $request->validate([
            'dijagnoza_id' => 'required',
            'lek_id' => 'required',
            'opis_dijagnoza' => 'required'
        ]);   

        $srednja_tabela_rezultati = Card::where('dijagnoza_id',$card->dijagnoza_id)->where('datum_posete',$card->datum_posete)->get();

        // brisanje podataka iz srednje tabele
        foreach($srednja_tabela_rezultati as $srednja_tabela){
            $delete_iz_srednje_tabele = Card::find($srednja_tabela->pacijent_dijagnoza_id)->delete();
        }

        

        // unos podataka i na taj nacin update podataka
        foreach( session('selektovani_lekovi') as $lek ){

            $insertInCard = $pacijent->bolesti()->attach($card->dijagnoza_id, [
                'lek_id' => $lek->lek_id,
                'opis_dijagnoza' => $request->opis_dijagnoza,
                'datum_posete' => Carbon::now()
            ] );
        }

        $request->session()->forget('selektovani_lekovi');

        return redirect()->route('card.index',$pacijent->pacijent_id)->with('status','Izvrsili ste update podataka iz tabele');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacijent $pacijent,Card $card)
    {
        
    }

    public function cardInformation(Request $request){

        $pacijent = Pacijent::find($request->pacijentId);
       
        
        $lekovi = Drug::all();
        $lekovi_za_bolest = Bolest::find($request->bolestid)->lekovi;

        return view('doctor.card.cardInformation',compact('lekovi','lekovi_za_bolest'));
    }

    public function searchDrug(Request $request){

       $drugName = $request->drugName;

       $lekovi_za_bolest = Bolest::find($request->bolestId)->lekovi;
  

       $searchDrugs = Drug::where('lek_naziv', 'LIKE', "%$drugName%")->get();
        

       return view('doctor.card.searchDrugs',compact('searchDrugs','lekovi_za_bolest'));

    }

    public function searchDrugForUpdate(Request $request){

 
        $drugName = $request->drugName;

        $test = Drug::where('lek_naziv', 'LIKE', "%$drugName%")->get();

        $drugs = session('svi_lekovi');


        $searchDrugs = collect();

        foreach($drugs as $t){
            if( $test->contains($t)){
                $searchDrugs[] = $t;
            }
        }

    //var_dump( $s->pluck('checked') );
        
        

    //     $card = Card::find( $request->cardId );
    //     $lekovi_za_bolest = Bolest::find( $card->dijagnoza_id )->lekovi;

    //     $res = Card::where('dijagnoza_id',$card->dijagnoza_id)->where('datum_posete',$card->datum_posete)->get()->pluck('lek_id');                                           
       

        return view( 'doctor.card.updateCardDrugsAjax',compact('searchDrugs'));

    }

    public function deleteCard(Pacijent $pacijent,Card $card){

        $srednja_tabela_rezultati = Card::where('dijagnoza_id',$card->dijagnoza_id)->where('datum_posete',$card->datum_posete)->get();

        foreach($srednja_tabela_rezultati as $red){
            $obrisi_red = Card::find($red->pacijent_dijagnoza_id)->delete();
        }

        return redirect()->route('card.index',$pacijent->pacijent_id)->with('status','Uspešno ste obrisali bolest');
    }

    public function addDrug(Request $request){

        // $drugId = $request->lek_id;

        // $drug = Drug::find( $drugId );

        // // dodavanje selektovanog leka u sesiju
        // $selected_drugs = session('selektovani_lekovi');
        // $selected_drugs[] = $drug;

        // Session::push('selektovani_lekovi', $selected_drugs);

        // // da bi mogao da izvrsim redirekciju
        // $card = Card::find($request->card_id);

        // $card_id = $card->pacijent_dijagnoza_id;
        // $pacijent_id = $card->pacijent_id;
        
        // return redirect()->route('card.edit',[$pacijent_id, $card_id]);
        
        $selektovani_lekovi = Drug::find($request->selectedValues);

        
        // session(['svi_lekovi' =>$svi_lekovi]);

        // $lista_lekova = session('svi_lekovi');

        
        foreach(session('svi_lekovi') as $object){

            if( $selektovani_lekovi->contains($object) ){

                $object->checked = 1;
            }else{
                $object->checked = 0;
            }
        }

        // var_dump( session('svi_lekovi')->pluck('checked') );


    }

    public function test(){

        // 1. izvuci lekove iz baze i smesti ih sesiju

        // 2. stavi stiklirane

        // 3. dodavanje i brisanje iz sesije vrednosti, stikli raj ili ne stikliraj

         // 4 pretraga vrednosti

         // 5 dodavanje niza iz sesije u bazu tacnije uzimanj idieva koji su stiklirani

         $lekovi = Drug::all();

         dd($lekovi);
    }
}
