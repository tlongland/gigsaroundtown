@extends('layouts.app')

@section('content')
    <main id="home">
        <div class="container">
                <section class="profinfo">
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="pic col-md-4">
                            <img src="{{get_image($user->image, "user/default.png")}}" class="img-circle" alt="">
                        </div>
                        <div class="col-md-4 users">
                            <h2>Welcome... {{$user->name}}</h2>
                            <h3>Reviews left: {{$user->review_count}}</h3>
                            <h5>Joined: <strong>{{$user->created_at->diffForHumans()}}</strong></h5>

                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Add Event
                            </button>
                            <div class="recommend">
                                <a href="/recommendations"> View your recommendations</a>
                            </div>

                        </div>
                        <div class="col-md-2">

                        </div>
                        <div>



                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Add your event...</h4>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST" action="/event" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="name">Event Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="name" required>

                                                    <label>Enter date of YYYY-MM-DD</label>
                                                    <input type="date" class="form-control" id="Date" name="Date" placeholder="Date" required>

                                                    <label for="upload">Upload a picture</label>
                                                    <input type="file" name="image" class="form-control" required>

                                                    <label for="description">Description of event</label>
                                                    <textarea name="description" placeholder="Enter description, Support, any other required details" class="form-control" required maxlength="200"></textarea>

                                                    <label for="venue">Venue</label>
                                                    <select class="select" id="venue_id" name="venue_id" required>
                                                        <option >Select a Venue</option>
                                                    </select>
                                                    <label for="headline">Headline</label>
                                                    <select class="select" id="band_id" name="band_id" required>
                                                            <option>Enter artist</option>
                                                    </select>
                                                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
        </div>
            <section class="user">
                <div class="container">
                <h3>Your Events</h3>
                <div class="row cardsec">
                    @foreach ($user->events as $events)
                        <section class="col-xs-6 col-sm-6 col-md-3">
                            <div class="card cards">
                                <div class="card-block">
                                    <h4 class="card-title">{{ $events->name }}</h4>
                                    <p class="card-text">{{ date('d F, Y', strtotime($events->Date)) }}</p>
                                    <div class="button">
                                        <a class="card-link" href="/event/{{ $events->id }}">View your events</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>
                </div>
            </section>
        <section class="revs">
            <div class="container">
                <h3>Reviews you have left</h3>
                <div class="row cardsec">
                    @foreach ($user->review as $revs)
                        <section class="col-xs-6 col-sm-6 col-md-3">
                            <div class="card cards">
                                <div class="card-block">
                                    <h4 class="card-title rev">{{ $revs->event->name }}</h4>
                                    <p class="card-text">Artist: {{$revs->art_rating}}
                                    Venue: {{$revs->ven_rating}}
                                    Price: {{$revs->price_rating}}</p>
                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>
            </div>
        </section>

    </main>
@endsection
