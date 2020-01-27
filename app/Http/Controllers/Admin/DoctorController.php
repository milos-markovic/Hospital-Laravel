<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usertype;
use App\User;

class DoctorController extends Controller
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
        $doctors = Usertype::find(3)->users;

        return view('admin.doctors.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
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

        $createAsistent = Usertype::find(3)->users()->create($validatedData);

        return redirect()->route('doctors.index')->with('status','Uneli ste novog doktora');
    
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
    public function edit(User $doctor)
    {

        return view('admin.doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $doctor)
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

        $updateDoctor = $doctor->update( $validatedData );

        return redirect()->route('doctors.index')->with('status','Uspešno ste izvršili promenu doktora');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $deleteDoctor = $doctor->delete();

        return redirect()->route('doctors.index')->with('status',"Uspesno ste obrisali doktora");
    }
}
