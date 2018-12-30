<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chirp;

class ChirpsController extends Controller
{
    public function index() {
    	$chirps = Chirp::all();
    	return view('chirps.index')->with('chirps', $chirps);
    }
    
}
