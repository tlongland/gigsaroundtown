@extends('layouts.app')

@section('content')
    <main id="event">
    <div class="container">
    <article class="info">
        <div class="row">
            <section class="pic col-md-6">
                <img src="{{get_image($event->image, "event_images/default.png")}}" alt="">
            </section>
            <section class="col-md-6 inf">
                <h1>{{$event->name}}</h1>
                <h4>Headline: <strong><a href="/artist/{{ $event->band->id }}">{{$event->band->name}}</a></strong></h4>
                <p>Description</p>
                <p>{{ $event->description }}</p>
                <p>Rating : {{round($final ,1)}}</p>
                <p>Amount attending: <strong>{{count($event->attend)}}</strong></p>
                <form method="POST" action="/event/{{$event->id}}/attending">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Are you attending</button>
                    </div>
                </form>
            </section>
        </div>
    </article>
        </div>
        <article class="ven">
            <div class="container">
                <section class="rating col-md-12">
                    <h3>Latest Reviews</h3>
                    <div class="col-md-1">

                    </div>
                    <ul class="list-group">
                        @foreach ($rev as $reviews)
                            <li class="list list-group-item col-md-3">
                                Posted by: <strong>{{$reviews->user->name}} </strong>
                                {{$reviews->created_at->diffForHumans()}}
                                <br>
                                Reviews Posted: <strong>{{$reviews->user->review_count}}</strong>
                                <hr>
                                <p><strong>Reviewers Opinion</strong></p>
                                Artist: <strong>{{$reviews->art_rating}}</strong> Venue: <strong>{{$reviews->ven_rating}}</strong> Price: <strong>{{$reviews->price_rating}}</strong>
                                <br>
                                {{$reviews->review}}
                            </li>
                        @endforeach
                    </ul>
                    <div class="col-md-6">

                    </div>
                </section>
                <section class="write">
                    <div class="revs col-md-6">
                        <h3>Amount of reviews: <strong>{{$c}}</strong></h3>
                    </div>
                    <div class="revs col-md-6">
                        <h3><a href="/event/{{ $event->id }}/review">Did you go? leave a Review</a></h3>
                    </div>
                </section>
            </div>
        </article>
        <div class="container">
            <article class="row info">
                    <h3>Venue</h3>
                    <section class="pic col-md-6">
                        <img src="{{get_image($event->venue->picture, "venue_images/default.png")}}" alt="">
                    </section>
                    <section class="col-md-6">
                        <h4>Venue: {{$event->venue->name}}</h4>
                        <p>About</p>
                        <p>{{$event->venue->about}}</p>
                        <p>Capacity: {{$event->venue->capacity}}</p>
                        <p>Location: {{$event->venue->location}}</p>
                        <p><a href="/venue/{{ $event->venue->id }}">See what other events are here</a></p>
                    </section>
            </article>
        </div>
        <article class="ven">
            <div class="container">
                <section class="comments">
                    <h3>Comments</h3>
                    <div id="comment">
                            @if (Auth::check())
                            <form class="col-md-6" method="POST" action="/event/{{ $event->id }}/comments">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea name="comment" placeholder="Your comment goes here." class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Comment</button>
                                </div>
                            </form>
                            @else
                            <div class="col-md-6">
                                <h4>Please login to comment</h4>
                            </div>
                            @endif
                        <ul class="list-group col-md-6 com">
                            @foreach($event->comments as $comment) 
                            <li class="list-group-item">
                                <strong>{{$comment->comment}} </strong>
                                <br>
                                Posted by: {{$comment->user->name}} {{$comment->created_at->diffForHumans() }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </article>
    </main>
@endsection