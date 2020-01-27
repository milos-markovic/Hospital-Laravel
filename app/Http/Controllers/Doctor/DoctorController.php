<?php

namespace App\Http\Controllers\Doctor;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $pacijents = Auth::user()->pacijents;

        return view('doctor.index',compact('pacijents'));
    }
}
