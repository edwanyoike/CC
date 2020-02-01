<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    //fundraiserable
    public function fundraiserable()
    {
        return $this->morphTo();

    }
}
