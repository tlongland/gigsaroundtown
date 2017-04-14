<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, event $event) {

        //dd($event);

        $event->comments()->create([
            'comment'=>request('comment'),
            'user_id'=> $request->user()->id
        ]);

        return redirect('/event/' . $event->id);

    }
}
