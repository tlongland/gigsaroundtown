@extends('layouts.app')

@section('content')
    <main id="events">
        <div class="jumbotron">
            <div class="container">
                <h1>Events</h1>

            </div>
        </div>
    <div class="container">
        <div class="row cardsec">
    @foreach ($event as $events)
                <section class="col-xs-6 col-sm-6 col-md-3">
                    <div class="card cards">
                        <img class="card-img-top" src="{{get_image($events->image, "event_images/default.png")}}" alt="">
                        <div class="card-block">
                            <h4 class="card-title">{{ $events->name }}</h4>
                            <p class="card-text">{{ date('d F, Y', strtotime($events->Date)) }}</p>
                            <div class="button">
                                <a class="card-link" href="/event/{{ $events->id }}">Find out more</a>
                            </div>
                        </div>
                    </div>
                </section>
    @endforeach
        </div>
    </div>

    </main>
@endsection