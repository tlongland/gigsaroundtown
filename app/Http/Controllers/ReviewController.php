<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\event;
use DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($id) {

        $event = App\event::find($id);

        //dd($event);

        $rev = App\review::where('event_id', '=', $id)->get();

        $artRating = $rev->pluck('art_rating');
        $venRating = $rev->pluck('ven_rating');
        $priceRating = $rev->pluck('price_rating');

        $art = $artRating->avg();
        $ven = $venRating->avg();
        $price = $priceRating->avg();


        //dd($art, $ven, $price);


        return view('event.review', compact('event', 'art', 'ven', 'price'));

    }

    public function store(Request $request, event $event) {

            $event->review()->create([
                'art_rating' => request('art_rating'),
                'ven_rating' => request('ven_rating'),
                'price_rating' => request('price_rating'),
                'review' => request('review'),
                'user_id'=> $request->user()->id
            ]);

            DB::table('users')->whereId($request->user()->id)->increment('review_count');


            return redirect('/event/' . $event->id);



    }

}
