@extends('layouts.app')

@section('content')
    <main id="search">
        <div class="jumbotron">
            <div class="container">
                <section>
                    <form id="searchpage" method="GET" action="/search">
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
        </div>
        <div class="container">
            <div class="row cardsec">
                @foreach ($searches as $search)
                    <section class="col-xs-6 col-sm-6 col-md-3">
                        <div class="card cards">
                            <img class="card-img-top" src="{{get_image($search->picture, "venue_images/default.png")}}" alt="{{$search->picture}}">
                            <h1 class="card-title venue">{{ $search->name }}</h1>
                            <div class="card-block">
                                <p class="card-text text">{{$search->about}}</p>
                                <div class="button">
                                    <a class="card-link" href="/venue/{{ $search->id }}">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>

    </main>
@endsection
