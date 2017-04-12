<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{

    protected $fillable = ['art_rating', 'ven_rating','price_rating', 'review', 'user_id', 'event_id'];

    public function user() {

        return $this->belongsTo(User::class);

    }

    public function event() {

        return $this->belongsTo(event::class);

    }




}
