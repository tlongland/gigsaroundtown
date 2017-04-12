@extends('layouts.app')

@section('content')
    <main id="artist">
    <div class="jumbotron">
        <div class="container">
            <h1>Artist</h1>
        </div>
    </div>
    <div class="container">
        <div class="row cardsec">
        @foreach ($artist as $artists)
            <section class="col-xs-6 col-sm-6 col-md-3">
                <div class="card cards">
                    <img class="card-img-top" src="{{get_image($artists->picture, "artist_images/default.png")}}" alt="{{$artists->picture}}">
                    <div class="card-block">
                        <h4 class="card-title band">{{$artists->name}}</h4>
                        <p class="card-text text arttext">Members: {{$artists->members}}</p>
                        <div class="button">
                            <a class="card-link" href="/artist/{{ $artists->id }}">Find out more</a>
                        </div>
                    </div>
                </div>
            </section>

            @endforeach
        </div>
        </div>
    </main>
@endsection
