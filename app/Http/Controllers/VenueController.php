<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class VenueController extends Controller
{
    public function index(){

        $venue = App\venue::all();


        return view('venue.venues', compact('venue'));

    }

    public function show($id){

        $venue = App\venue::find($id);


        return view('venue.venue', compact('venue'));

    }
}
