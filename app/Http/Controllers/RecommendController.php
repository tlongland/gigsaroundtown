<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;


class RecommendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        //get current user id
        $user = $request->user();

        //dd($user);

        //get all reviews based on user id
        $reviews = App\review::where([
            ['user_id', '=', $user->id],
        ])->get();

        //get count of how many records in the collection
        $count = count($reviews);

        //dd($reviews);
        $review_ids = [];
        $rev_ids = [];
        // create an if for above 0
        if ($count > 0) {
            for ($a=0; $a < $count; $a++) {
                $rev_ids[] = $reviews[$a]->event_id;
            }

            for($i=0; $i < $count; $i++) {

                if ($reviews[$i]->art_rating >= 7) {
                    if ($reviews[$i]->ven_rating >= 7) {
                        if ($reviews[$i]->price_rating >= 7) {
                            $review_ids[] = $reviews[$i]->event_id;
                        }
                    }
                }
            }
            //dd($review_ids);
        }
        //gets all other reviews based on event id and other users
        $rev = DB::table('reviews')
            ->whereIn('event_id', $review_ids)
            ->where([
                ['user_id', '!=', $user->id],
                ['art_rating', '>=', 7],
                ['ven_rating', '>=', 7],
                ['price_rating', '>=', 7],
            ])->get();

        //dd($rev);
        $rc = count($rev);
        $u = [];


        if ($rc > 0) {

            for($i=0; $i < $rc; $i++) {

                $u[] = $rev[$i]->user_id;

                //dd($review_ids);
            }
        }
        //gets all other reviews by other users
        $r = DB::table('reviews')
            ->whereIn('user_id', $u)
            ->whereNotIn('event_id', $rev_ids)
            ->where([
                ['user_id', '!=', $user->id],
                //['event_id', '!=', $review_ids],
                ['art_rating', '>=', 7],
                ['ven_rating', '>=', 7],
                ['price_rating', '>=', 7],
            ])->get();

        //dd($r);

        //get recommendations from final choice

        $c = count($r);

        //dd($c);

        $event_ids = [];

        if ($c > 0) {

            for($e = 0; $e < $c; $e++) {

                $event_ids[] = $r[$e]->event_id;

            }
        }

        //dd($event_ids);

        $recommend = DB::table('events')
            ->whereIn('id', $event_ids)
            ->get();

        //dd($recommend);

// db call from above
        return view('recommendations', compact('recommend'));

    }

}
