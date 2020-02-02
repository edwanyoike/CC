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

    //many churches can have one fundraiser
    public function churches()
    {
        return $this->morphedByMany(Church::class, 'fundraiserable');
    }


    public function departments()
    {
        return $this->morphedByMany(Department::class, 'fundraiserable');
    }


}
