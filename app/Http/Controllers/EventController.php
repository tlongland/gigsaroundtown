<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Storage;
use Illuminate\Support\Facades\File;
use League\Flysystem\Filesystem;
use App;
use App\attend;
use App\event;

class EventController extends Controller
{

    //public function __construct(){

        //$this->middleware('guest');

    //}

    public function index(){

        $event = App\event::latest()->get();

        return view('event.events', compact('event'));

    }

    public function show($id){

        $event = App\event::find($id);

        //dd($event);

        $rev = App\review::where('event_id', '=', $id)->latest()->limit(3)->get();

        $revs = App\review::where('event_id', '=', $id)->get();

        $c = count($revs);

        $review = $event->review;

        $final = 0;

        $artRating = $review->pluck('art_rating');
        $venRating = $review->pluck('ven_rating');
        $priceRating = $review->pluck('price_rating');

        $allRatings = $artRating->merge($venRating)
            ->merge($priceRating);

        //$rate->all();

        //dd($allRatings);

        //dd($artRate);

        $count= count($allRatings);

        if ($count > 0) {

            for ($i = 0; $i < $count; $i++) {

                if ($allRatings[$i] >= 8) {

                    $allRatings[$i] += 0;

                } else if ($allRatings[$i] >= 4) {

                    $allRatings[$i] += 3;
                    if ($allRatings[$i] > 10) {

                        $allRatings[$i] = 10;

                    }

                } else if ($allRatings[$i] >= 1) {

                    $allRatings[$i] += 0;

                }

            }

            $sum =$allRatings->sum();

            $final = $sum /$count;
        }

        //dd($allRatings);



        //$rating = get_object_vars($artRating);



        //dd($final);


        return view('event.event', compact('event', 'review', 'final', 'rev', 'c'));

    }

    public function store(Request $request){

        //dd(request()->all());

        //create new post
        $event = new App\event;

        $event->name = request('name');
        $event->Date = request('Date');
        $event->venue_id = request('venue_id');
        $event->band_id = request('band_id');
        $event->user_id = request('user_id');
        $event->description = request('description');



        request()->file('image')->store('/event_images', 's3');

        //$event->image = request()->file('image')->store('/event_images');

        $event->image = request()->file('image')->store('/event_images', 's3');

        //save to database

        $event->save();

        //redirect

        return redirect('/home');

    }

}
