@extends('layouts.app')

@section('content')
    <main id="recommendations">
        <div class="jumbotron">
            <div class="container">
                <h1>Your Recommendations</h1>
            </div>
        </div>
        <div class="container">
            <div class="row cardsec">
                @foreach ($recommend as $recs)
                    <section class="col-xs-6 col-sm-6 col-md-3">
                        <div class="card cards">
                            <img class="card-img-top" src="{{get_image($recs->image, "event_images/default.png")}}" alt="">
                            <div class="card-block">
                                <h4 class="card-title">{{ $recs->name }}</h4>
                                <p class="card-text">{{ date('d F, Y', strtotime($recs->Date)) }}</p>
                                <div class="button">
                                    <a class="card-link" href="/event/{{ $recs->id }}">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    </main>
@endsection