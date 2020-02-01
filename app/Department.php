<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function departmentable()
    {
        return $this->morphTo();
    }
}
