<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    public function projectable()
    {
        return $this->morphTo();
    }
}
