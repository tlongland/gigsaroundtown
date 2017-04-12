<?php

namespace App\Http\Controllers;

use App\band;
use App\venue;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function venue(Request $request) {

        $search = $request->get("q");

        $venues = venue::where('name', 'LIKE', '%'.$search. '%')->paginate(15);

        return $venues;

    }

    public function band(Request $request) {

        $search = $request->get("q");

        $bands = band::where('name', 'LIKE', '%'.$search. '%')->paginate(15);

        return $bands;

    }

    public function index() {

        $search = \Request::get('search');

        //dd($search);

        $searches = venue::where('location', 'LIKE', '%'.$search. '%')->get();

        //dd($sear);


        return view('search', compact('searches'));


    }
}
