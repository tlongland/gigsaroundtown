<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['comment', 'event_id', 'user_id'];

    public function event(){

        return $this->belongsTo(event::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }
}
