<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //eventable

    public function eventable()
    {
        return $this->morphTo();

    }
}
