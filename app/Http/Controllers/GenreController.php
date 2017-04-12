<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class GenreController extends Controller
{
    public function show($id){

        $gen = App\genre::find($id);

        //dd($gen);

        $genre = DB::table('genres')
            ->get();

        //dd($genre);

        return view('genre.genre', compact('gen', 'genre'));

    }

}
