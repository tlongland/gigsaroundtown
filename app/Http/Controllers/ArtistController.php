<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Html\HtmlServiceProvider;
use App;

class ArtistController extends Controller
{
    public function index(){

        $artist = App\band::all();


        return view('artist.artist', compact('artist'));

    }

    public function show($id){


        $artist = App\band::find($id);

        //dd($artist);

        return view('artist.show', compact('artist'));

    }
}
