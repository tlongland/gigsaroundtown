@extends('layouts.app')

@section('content')
    <main id="venue">
    <div class="container">
        <article class="info">
            <div class="row">
                <section class="pic col-md-6">
                    <img class="card-img-top" src="{{get_image($venue->picture, "venue_images/default.png")}}" alt="">
                </section>
                <section class="col-md-6">
                    <h1>{{$venue->name}}</h1>
                    <h4>Capacity: {{$venue->capacity}}</h4>
                    <br>
                    <p>{{$venue->about}}</p>
                </section>
            </div>
        </article>
    </div>
        <article class="events">
            <div class="container">
                <h3>Events</h3>
                @foreach ($venue->event as $venues)
                    <section class="col-xs-6 col-sm-6 col-md-3">
                        <div class="card cards">
                            <img class="card-img-top" src="{{get_image($venues->image, "event_images/default.png")}}" alt="{{$venues->name}}">
                            <div class="card-block">
                                <h4 class="card-title">{{ $venues->name }}</h4>
                                <p class="card-text">{{ date('d F, Y', strtotime($venues->Date)) }}</p>
                                <div class="button">
                                    <a class="card-link" href="/event/{{ $venues->id }}">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </article>
    </main>
@endsection

