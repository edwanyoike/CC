<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{


    //many members can join a department
    public function departmentable()
    {
        return $this->morphTo();
    }


    public function members()
    {
        return $this->morphedByMany(Member::class, 'departmentable');
    }


    //department can have many projects
    public function projects()
    {
        return $this->morphToMany(Project::class, 'projectable');
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
