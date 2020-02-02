<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function departments()
    {
        return $this->morphedByMany(Department::class, 'projectable');
    }

    public function churches()
    {
        return $this->morphedByMany(Church::class, 'projectable');
    }
}
