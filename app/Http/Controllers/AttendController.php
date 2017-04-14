<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\event;

class AttendController extends Controller
{

    public function store(Request $request, event $event){


        $event->attend()->create([
        'user_id'=> $request->user()->id
        ]);

    return redirect('/event/' . $event->id);

    }
}
