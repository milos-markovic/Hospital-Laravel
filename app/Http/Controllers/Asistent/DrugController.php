<?php

namespace App\Http\Controllers\Asistent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Drug;
use App\CategoryDrug;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }


    public function index($categoryId)
    {

        $categoryDrug = CategoryDrug::find($categoryId);

        $drugs = CategoryDrug::find($categoryId)->drugs;

        return view('asistent.drugs.index',compact('drugs','categoryDrug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($categoryId)
    {
        //$categoryDrug = CategoryDrug::find($categoryId);

        return view('asistent.drugs.create', ['categoryId'=>$categoryId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $categoryDrug)
    {
        //$request->request->add(['lek_kategorija_id' => $categoryDrug]);
        $validatedData = $request->validate([
            'lek_stanje_magacin'=> 'required',
            'lek_naziv'=> 'required',
            'lek_sifra'=> 'required',
            'lek_kategorija_id'=>'required'
        ]);
        //da vidimo sta smo dobili
        //return json_encode([$request->all(), $categoryDrug]);
        
        $createDrug = Drug::create( $validatedData );
        return redirect()->route('drugs.index', 
            [
                'CategoryDrug'=>$categoryDrug
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryDrug, $drugId)
    {
        $drug = Drug::find($drugId);

        return view('asistent.drugs.edit', compact('drug'));
        // dd($drug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryDrug, $drugId)
    {
        $validatedData = $request->validate([
            'lek_naziv'=> 'required',
            'lek_sifra'=> 'required',
            'lek_stanje_magacin'=> 'required'
        ]);
        $updateDrug = Drug::find($drugId)->update($validatedData);

        return redirect()->route('drugs.index',$categoryDrug)->with('status','Izmenili ste lek');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorDrugId,$drugId)
    {
        $drug = Drug::find($drugId)->delete();

        return redirect()->route('drugs.index',$categorDrugId)->with('status','Obrisali ste lek');
    }
}
