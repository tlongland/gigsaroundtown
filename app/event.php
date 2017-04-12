<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{

    protected $fillable = ['name', 'date', 'image', 'venue_id', 'head_id', 'support_id', 'user_id'];

    public function comments(){

        return $this->hasMany(Comment::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function file(){


    }

    public function band(){

        return $this->belongsTo(band::class);

    }

    public function venue() {

        return $this->belongsTo(venue::class);

    }

    public function review() {

        return $this->hasMany(review::class);

    }
}
