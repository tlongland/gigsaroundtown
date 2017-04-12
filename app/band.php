<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class band extends Model
{
    public function event() {

        return $this->hasMany(event::class);

    }

    public function genre() {

        return $this->belongsTo(genre::class);

    }
}
