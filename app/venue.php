<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venue extends Model
{
    public function event() {

        return $this->hasMany(event::class);

    }
}
