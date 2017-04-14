@extends('layouts.app')

@section('content')
    <main id="artists">
        <div class="container">
            <article class="info">
                <div class="row">
                    <section class="pic col-md-6">
                        <img class="card-img-top" src="{{get_image($artist->picture, "artist_images/default.png")}}" alt="">
                    </section>
                    <section class="col-md-6">
                        <h1>{{$artist->name}}</h1>
                        <h4>Members:</h4>
                        <p>{{ $artist->members }}</p>
                        <br>
                        <p>Genre: <strong>{{$artist->genre->genre}}</strong></p>
                    </section>
                </div>
            </article>
        </div>
            <article>
                <div class="container">
                    <div class="artAbout">
                        <h3>About</h3>
                        <p>{{$artist->about}}</p>
                    </div>
                </div>
            </article>

        <article class="events">
            <div class="container">
                <h3>Events</h3>
                @foreach ($artist->event as $art)
                    <section class="col-xs-6 col-sm-6 col-md-3">
                        <div class="card cards">
                            <img class="card-img-top" src="{{get_image($art->image, "event_images/default.png")}}" alt="{{$art->name}}">
                            <div class="card-block">
                                <h4 class="card-title">{{ $art->name }}</h4>
                                <p class="card-text">{{ date('d F, Y', strtotime($art->Date)) }}</p>
                                <div class="button">
                                    <a class="card-link" href="/event/{{ $art->id }}">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </article>
    </main>
@endsection
