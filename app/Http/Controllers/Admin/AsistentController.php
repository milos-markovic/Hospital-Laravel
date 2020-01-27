<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usertype;
use App\User;

class AsistentController extends Controller
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
        $asistents = Usertype::find(2)->users;

        return view('admin.asistents.index',compact('asistents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.asistents.create');
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
            'ime' => 'required',
            'prezime' => 'required',
            'adresa' => 'required',
            'telefon' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $createAsistent = Usertype::find(2)->users()->create($validatedData);

        return redirect()->route('asistents.index')->with('status','Uneli ste novog asistenta');
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
    public function edit(User $asistent)
    {
        //dd( $asistent );

        return view( 'admin.asistents.edit',compact('asistent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $asistent)
    {
        $validatedData = $request->validate([
            'ime' => 'required',
            'prezime' => 'required',
            'adresa' => 'required',
            'telefon' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $updateAsistent = $asistent->update( $validatedData );

        return redirect()->route('asistents.index')->with('status','Uspešno ste izvršili promenu korisnika');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $asistent)
    {
        $deleteAsistent = $asistent->delete();

        return redirect()->route('asistents.index')->with('status','Asistent je obrisan');
    }
}
