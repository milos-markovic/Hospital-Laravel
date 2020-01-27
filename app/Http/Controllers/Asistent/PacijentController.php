<?php

namespace App\Http\Controllers\Asistent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usertype;
use App\Pacijent;

class PacijentController extends Controller
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
      $pacijents =  Pacijent::all();
      
      return view('asistent.pacijents.index', compact('pacijents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Usertype::find(3)->users;


        return view('asistent.pacijents.create',compact('doctors'));
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
            'pacijent_ime' => 'required',
            'pacijent_prezime' => 'required',
            'pacijent_adresa' => 'required',
            'pacijent_telefon' => 'required',
            'pacijent_datum_rodjenja' => 'required',
            'pacijent_pol' => 'required',
            'pacijent_krvna_grupa' => 'required',
            'pacijent_broj_knjizice' => 'required',
            'pacijent_broj_kartona' => 'required',
            'korisnik_id'=> 'required'
        ]);

        $createPacijent = Pacijent::create( $validatedData );

        return redirect()->route('pacijents.index')->with('status','Uneli ste jos jednog pacijenta');

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
    public function edit(Pacijent $pacijent)
    {
        $doctors = Usertype::find(3)->users;

        return view('asistent.pacijents.edit', compact('pacijent','doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pacijent $pacijent)
    {
        $validatedData = $request->validate([
            'pacijent_ime' => 'required',
            'pacijent_prezime' => 'required',
            'pacijent_adresa' => 'required',
            'pacijent_telefon' => 'required',
            'pacijent_datum_rodjenja' => 'required',
            'pacijent_pol' => 'required',
            'pacijent_broj_knjizice' => 'required',
            'pacijent_broj_kartona' => 'required',
            'pacijent_krvna_grupa' => 'required',
            'korisnik_id' => 'required'
        ]);

        $updatePacijent = $pacijent->update( $validatedData );

        return redirect()->route('pacijents.index')->with('status','Izmenili ste pacijenta');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacijent $pacijent)
    {
        $deletePacijent = $pacijent->delete();

        return redirect()->route('pacijents.index')->with('status','Obrisali ste pacijenta');
    }
}
