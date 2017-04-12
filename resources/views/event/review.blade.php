@extends('layouts.app')

@section('content')
    <main id="review">
    <div class="jumbotron">
        <div class="container">
            <h1 class="col-md-6">{{$event->name}} Review</h1>
            <div class="col-md-6 rate">
                <p class="col-md-4">Artist: {{round($art, 1)}}</p>
                <p class="col-md-4">Venue: {{round($ven, 1)}}</p>
                <p class="col-md-4">Price: {{round($price, 1)}}</p>
            </div>
        </div>
    </div>
    <article class="container">
        <h3>Leave your review</h3>
        <section class="row">
            <form class="col-md-6" method="POST" action="/event/{{$event->id}}/review">
                {{ csrf_field() }}
                <div class="col-md-4">
                    <label class="control-label" for="art_rating"> Artist Rating</label>
                    <select class="form-control" name="art_rating" id="art_rating" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="ven_rating"> Venue Rating</label>
                    <select class="form-control" name="ven_rating" id="ven_rating" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="price_rating">Price Rating</label>
                    <select class="form-control" name="price_rating" id="price_rating" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="form-group col-md-12" id="review-comment">
                    <textarea name="review" placeholder="Tell us what you thought!" class="form-control" required></textarea>
                </div>
                <div>
                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id }}">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit review</button>
                </div>
            </form>
            <section class="rating col-md-6">
                <h3>Previous Reviews</h3>
                <ul class="list-group">
                    @foreach ($event->review as $reviews)
                        <li class="list-group-item">
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
            </section>
        </section>
    </article>
    </main>
@endsection