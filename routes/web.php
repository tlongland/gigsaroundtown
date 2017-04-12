<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $latest = DB::table('events')
        ->latest()
        ->limit(4)
        ->get();

    $artistLat = DB::table('bands')
        ->latest()
        ->limit(4)
        ->get();

    $ven = DB::table('venues')
        ->limit(4)
        ->get();

    $genre = DB::table('genres')
        ->get();

    return view('welcome', compact('latest', 'artistLat', 'ven', 'genre'));
});


Route::get('/about', function(){
   return view('about');
});

Route::get('/search', 'SearchController@index');

Route::get('/event', 'EventController@index');

Route::get('/event/{event}', 'EventController@show');

Route::post('/event', 'EventController@store');


Route::get('/artist', 'ArtistController@index');

Route::get('/artist/{artist}', 'ArtistController@show');


Route::get('/venue', 'VenueController@index');

Route::get('/venue/{venue}', 'VenueController@show');

Route::post('/event/{event}/comments', 'CommentController@store');

Route::get('/genre/{genre}', 'GenreController@show');

Route::get('/event/{event}/review', 'ReviewController@index');

Route::post('/event/{event}/review', 'ReviewController@store');

Route::get('/search/venues', 'SearchController@venue');

Route::get('/search/bands', 'SearchController@band');





Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/recommendations', 'RecommendController@index');

