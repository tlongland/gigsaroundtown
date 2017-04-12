<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    public function band () {

        return $this->hasMany(band::class);

    }
}
