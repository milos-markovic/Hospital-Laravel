<?php

namespace App\Http\Controllers\Asistent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bolest;

class BolestController extends Controller
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
        $bolesti =  Bolest::orderBy('dijagnoza_id', 'desc')->get();
      
      return view('asistent.bolesti.index', compact('bolesti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asistent.bolesti.create');
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
            'dijagnoza_naziv' => 'required'
        ]);

        $createBolest = Bolest::create( $validatedData );

        return redirect()->route('bolesti.index')->with('status','Uneli ste naziv bolesti');

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
    public function edit($id)
    {
        $bolest = Bolest::find($id);

        return view('asistent.bolesti.edit', compact('bolest'));
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
            'dijagnoza_naziv' => 'required'
        ]);

        $updateBolest = Bolest::find($id)->update($validatedData);

        return redirect()->route('bolesti.index')->with('status','Izmenili ste naziv bolesti');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bolestDelete = Bolest::find($id)->delete();

        return redirect()->route('bolesti.index')->with('status','Obrisali ste bolest');  
    }
}
