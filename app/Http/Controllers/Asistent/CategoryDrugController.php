<?php

namespace App\Http\Controllers\Asistent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoryDrug;

class CategoryDrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categoryDrugs = CategoryDrug::all();

        return view('asistent.categoryDrugs.index',compact('categoryDrugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asistent.categoryDrugs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lek_kategorija_naziv'=> 'required'
        ]);

        $createCategoryDrugs = CategoryDrug::create( $validatedData );

        return redirect()->route('categoryDrugs.index')->with('status','Uneli ste novu kategoriju leka');

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
    public function edit(CategoryDrug $categoryDrug)
    {
       

        return view('asistent.categoryDrugs.edit', compact('categoryDrug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'lek_kategorija_naziv'=> 'required'
        ]);
        
        $updateCategoryDrug = CategoryDrug::find($id)->update($validatedData);

         return redirect()->route('categoryDrugs.index')->with('status','Izmenili ste naziv kategorije leka');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCategoryDrug = CategoryDrug::find($id)->delete();

        return redirect()->route('categoryDrugs.index')->with('status','Obrisali ste kategoriju leka');  
    }
}
