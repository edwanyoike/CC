<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    public function memberable()
    {
        return $this->morphTo();
    }



}
