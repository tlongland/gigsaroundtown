@extends('layouts.app')

@section('content')
<main id="index">
    <div id="banner">
        <section id="search" class="container">
            <form id="searchbox" method="GET" action="/search">
                    <div class="col-md-2">

                    </div>
                    <div class="form-group col-xs-9 col-sm-6 col-md-6">
                        <input type="text" id="searchinput" name="search" placeholder="Search your area for venues">
                    </div>
                    <div class="form-group col-xs-3 col-sm-6 col-md-2">
                        <button type="submit" id="searchbut" class="btn btn-primary">Search</button>
                    </div>
                    <div class="col-md-2">

                    </div>
            </form>
        </section>
    </div>
        <div class="container">
            <article id="latest">
                <div class="row">
                <h3>Latest Events</h3>
                @foreach ($latest as $latests)
                    <section class="col-xs-6 col-sm-6 col-md-3">
                        <div class="card cards">
                            <img class="card-img-top" src="{{get_image($latests->image, "event_images/default.png")}}" alt="{{$latests->name}}">
                            <div class="card-block">
                                <h4 class="card-title">{{ $latests->name }}</h4>
                                <p class="card-text">{{ date('d F, Y', strtotime($latests->Date)) }}</p>
                                <div class="button">
                                <a class="card-link" href="/event/{{ $latests->id }}">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach

                </div>
                <div class="more">
                    <a href="/event">See more events</a>
                </div>
            </article>
        </div>
        <article id="latbands">
        <div class="container">
                <div class="row">
                    <h3>Latest Bands</h3>
                    @foreach ($artistLat as $artistLats)
                        <section class="col-xs-6 col-sm-6 col-md-3">
                            <div class="card cards">
                                <img class="card-img-top" src="{{get_image($artistLats->picture, "artist_images/default.png")}}" alt="{{$artistLats->name}}">
                                <div class="card-block">
                                    <h4 class="card-title band">{{ $artistLats->name }}</h4>
                                    <p class="card-text text">Members: {{ $artistLats->members }}</p>
                                    <div class="button">
                                        <a class="card-link" href="/artist/{{ $artistLats->id }}">Find out more</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endforeach

                </div>
                <div class="more">
                    <a href="/artist">See more events</a>
                </div>
        </div>
        </article>

    <div class="container">
        <article id="latest">
            <div class="row">
                <h3>Venues</h3>
                @foreach ($ven as $vens)
                    <section class="col-xs-6 col-sm-6 col-md-3">
                        <div class="card cards">
                            <img class="card-img-top" src="{{get_image($vens->picture, "venue_images/default.png")}}" alt="{{$vens->name}}">
                            <div class="card-block">
                                <h4 class="card-title venue">{{ $vens->name }}</h4>
                                <p class="card-text text">{{ $vens->about }}</p>
                                <div class="button">
                                    <a class="card-link" href="/venue/{{ $vens->id }}">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach

            </div>
            <div class="more">
                <a href="/venue">See more events</a>
            </div>
        </article>
    </div>
        <article class="genre">
            <div class="container">
            <div class="row">
                <h3>Genre</h3>
            @foreach($genre as $genres)
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <div class="gen"><a href="/genre/{{ $genres->id }}">
                        <img src="{{ Storage::disk('s3')->url($genres->picture) }}" alt="{{$genres->genre}}">{{$genres->genre}}

                    </a></div>
                </div>
            @endforeach
            </div>
            </div>
        </article>
</main>
@endsection
