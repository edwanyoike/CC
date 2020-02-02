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

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    public function Contributions()
    {
        return $this->morphMany('App\Contribution','contributionable');

    }

    public function departments()
    {
        return $this->morphToMany(Department::class, 'departmentable');
    }



}
