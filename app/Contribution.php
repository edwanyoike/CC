<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    //
    public function contributionable()
    {
        return $this->morphTo();
    }
}
