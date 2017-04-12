@extends('layouts.app')

@section('content')
    <main id="venues">
        <div class="jumbotron">
            <div class="container">
                <h1>Venues</h1>
            </div>
        </div>
        <div class="container">
            <div class="row cardsec">
    @foreach ($venue as $venues)
                <section class="col-xs-6 col-sm-6 col-md-3">
                    <div class="card cards">
                        <img class="card-img-top" src="{{get_image($venues->picture, "venue_images/default.png")}}" alt="{{$venues->picture}}">
                        <h1 class="card-title venue">{{ $venues->name }}</h1>
                        <div class="card-block">
                            <p class="card-text text">{{$venues->about}}</p>
                            <div class="button">
                                <a class="card-link" href="/venue/{{ $venues->id }}">Find out more</a>
                            </div>
                        </div>
                    </div>
                </section>
    @endforeach
            </div>
        </div>
    </main>
@endsection