@extends('layouts.app')

@section('content')
    <main id="genre">
        <div class="jumbotron">
            <div class="container">
                <h1>{{$gen->genre}}</h1>

            </div>
        </div>
        <div class="container">

            <div class="row">
                @foreach ($gen->band as $genres)
                    <section class="col-xs-6 col-sm-6 col-md-3">
                        <div class="card cards">
                            <img class="card-img-top" src="{{get_image($genres->picture, "artist_images/default.png")}}" alt="{{$genres->picture}}">
                            <div class="card-block">
                                <h4 class="card-title band">{{$genres->name}}</h4>
                                <p class="card-text text">Members: {{$genres->members}}</p>
                                <div class="button">
                                    <a class="card-link" href="/artist/{{ $genres->id }}">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>

        </div>
        <article class="genre">
            <div class="container">
            <div class="row">
                <h3>Genres</h3>
                @foreach($genre as $gens)
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <a href="/genre/{{ $gens->id }}">{{$gens->genre}}
                            <img src="{{ Storage::disk('s3')->url($gens->picture) }}" alt="{{$gens->genre}}">

                        </a>
                    </div>
                @endforeach
            </div>
            </div>
        </article>
    </main>
@endsection