<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $table = 'churches';

    //

    public function members()
    {
        return $this->morphMany('App\member', 'memberable');
    }

    public function departments()
    {
        return $this->morphMany('App\Department','departmentable');

    }

    public function projects()
    {
        return $this->morphToMany(Project::class, 'projectable');
    }


    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }


    public function Contributions()
    {
        return $this->morphMany('App\Contribution', 'contributionable');

    }


    public function fundraisers()
    {
        return $this->morphToMany(Fundraiser::class, 'fundraiserable');
    }


    public function Events()
    {
        return $this->morphMany('App\Event', 'eventable');

    }


}
